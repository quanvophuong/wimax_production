<?php

namespace Plugin\HsdGreenFormPg\Controller\Admin;

use Eccube\Controller\AbstractController;
use Plugin\HsdGreenFormPg\Form\Type\Admin\ConfigType;
use Plugin\HsdGreenFormPg\Repository\ConfigRepository;
use Symfony\Component\HttpFoundation\Request;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\HttpFoundation\JsonResponse;

class ConfigController extends AbstractController
{
    /**
     * @var ConfigRepository
     */
    protected $configRepository;

    // 税率の計算方法
    private $_calc_rule = 'round'; // 四捨五入

    // 税(10%)
    private $_tax = 1.10;

    // GreenFormID
    private $_greenform_id = '';

    // GreenForm初期PW
    private $_greenform_default_pw = '';

    /**
     * ConfigController constructor.
     *
     * @param ConfigRepository $configRepository
     */
    public function __construct(ConfigRepository $configRepository)
    {
        $this->configRepository = $configRepository;
    }

    /**
     * @Route("/%eccube_admin_route%/hsd_green_form/config", name="hsd_green_form_pg_admin_config")
     * @Template("@HsdGreenFormPg/admin/config.twig")
     */
    public function index(Request $request)
    {
        $Config = $this->configRepository->get();
        $form = $this->createForm(ConfigType::class, $Config);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $Config = $form->getData();
            $this->entityManager->persist($Config);
            $this->entityManager->flush($Config);
            $this->addSuccess('登録しました。', 'admin');

            return $this->redirectToRoute('hsd_green_form_pg_admin_config');
        }

        // GreenFormの初回ログインID、PWを表示
        $gf_id = str_replace('.', '_', $_SERVER['HTTP_HOST']);
        $gf_pw = $_SERVER['HTTP_HOST'];

        return [
            'form' => $form->createView(),
            'gf_id' => $gf_id,
            'gf_pw' => $gf_pw,
        ];
    }

    /**
     * @Route("/%eccube_admin_route%/hsd_green_form/save_mag", name="hsd_green_form_pg_admin_save_mag")
     * @Template("@HsdGreenFormPg/admin/hsd_green_form_save.twig")
     */
    public function save_mag(Request $request)
    {
        $req = $request->request->all();
        // 集計期間
        $agg_start = $req['agg_start'];
        $agg_end = $req['agg_end'];
        // GreenFormID,PW、フォームID
        $gf_id = $req['gf_id'];
        $gf_pw = $req['gf_pw'];
        $gf_formid = $req['gf_formid'];
        $gf_count = $req['gf_count'];
        $create_date = date('Y-m-d H:i:s');
        $em = $this->entityManager;

        // 集計期間のオーダーのproduct_idを取得。
        $stmt = $em->getConnection()->prepare('select oi.product_id from dtb_order as o, dtb_order_item as oi where o.id = oi.order_id and o.order_date >= :agg_start and o.order_date <= :agg_end limit ' . $gf_count);
        $stmt->execute(array('agg_start' => $agg_start, 'agg_end' => $agg_end));
        $rs_prid = $stmt->fetchAll();

        // product_idごとに集計
        $agg_ar = array();
        foreach($rs_prid as $item){
            if( !empty($item['product_id']) ){
                if( !isset($agg_ar[$item['product_id']]) ){
                    $agg_ar[$item['product_id']] = 1;
                }else{
                    $agg_ar[$item['product_id']]++;
                }
            }
        }
        arsort($agg_ar); // orderされた数の多い順でソート

        // ソートされたproduct_idでprice02を取得し、price02の最低金額を取得
        $min_price_ar = array();
        foreach($agg_ar as $key => $val){
            $stmt_price = $em->getConnection()->prepare('select product_id, price02 from dtb_product_class where product_id = :pid');
            $stmt_price->execute(array('pid' => $key));
            $rs_price = $stmt_price->fetchAll();
            foreach($rs_price as $price_item){
                if( !isset($min_price_ar[$key]) ){
                    $min_price_ar[$key] = 99999999999;
                }
                if( $min_price_ar[$key] > $price_item['price02'] ){
                    $min_price_ar[$key] = $price_item['price02'];
                }
            }
        }

        // 税率、計算方法を取得
        $now = date('Y-m-d H:i:s');
        $tax_stmt = $em->getConnection()->prepare("select t.tax_rate, t.rounding_type_id from dtb_tax_rule as t where t.apply_date >= '" . $now ."'");
        $tax_stmt->execute();
        $dmy = $tax_stmt->fetchAll();
        if( $dmy != null ){
            if( $dmy[0]['rounding_type_id'] == '2' ){
                // 切り捨て
                $this->_calc_rule = 'floor';
            }else if( $dmy[0]['rounding_type_id'] == '3' ){
                // 切り上げ
                $this->_calc_rule = 'ceil';
            }
            $this->_tax = 1.0 + $dmy[0]['tax_rate'] / 100;
        }

        /*
         * 商品名、description_detail, price02の最小値
         * にて、メルマガ用テキスト、HTMLを生成。
         */
        $out_text = '';
        $out_html = '';
        $baseurl = $request->getScheme() . '://' . $request->getHttpHost() . $request->getBasePath();
        foreach($agg_ar as $key => $val) {
            $stmt_mag = $em->getConnection()->prepare('select name, description_detail from dtb_product where id = :pid');
            $stmt_mag->execute(array('pid' => $key));
            $rs_mag = $stmt_mag->fetchAll();
            $out_html .= '<p>' . $rs_mag[0]['name'] . '<br>';
            $out_text .= $rs_mag[0]['name'] . PHP_EOL;
            if( !empty($rs_mag[0]['description_detail']) ){
                $out_html .= $rs_mag[0]['description_detail'] . '<br>';
                $out_text .= $rs_mag[0]['description_detail'] . PHP_EOL;
            }
            $intax_price = 0;
            switch($this->_calc_rule){
                case 'round':
                    $intax_price = round(floatval($min_price_ar[$key]) * $this->_tax);
                    break;
                case 'floor':
                    $intax_price = floor(floatval($min_price_ar[$key]) * $this->_tax);
                    break;
                case 'ceil':
                    $intax_price = ceil(floatval($min_price_ar[$key]) * $this->_tax);
                    break;
            }
            $out_html .= '価格 ' . number_format($intax_price) . '円' . '<br>';
            $out_text .= '価格 ' . number_format($intax_price) . '円' . PHP_EOL;
            $out_html .= 'URL ' . '<a href="' . $baseurl . '/products/detail/' . $key . '">' . $baseurl . '/products/detail/' . $key . '</a>';
            $out_text .= 'URL ' . $baseurl . '/products/detail/' . $key . PHP_EOL;
            $out_html .= '</p>' . PHP_EOL;
            $out_html .= PHP_EOL;
            $out_text .= PHP_EOL;
        }
        $b64_html = base64_encode($out_html);
        $b64_text = base64_encode($out_text);

        // GreenFormの該当ユーザのメルマガへ新規保存
        $protocol = 'http';
        if( array_key_exists('HTTPS', $_SERVER) && $_SERVER['HTTPS'] == 'on' ){
            $protocol = 'https';
        }
        $url = 'https://greenform.jp/gfapi/recmag/' . $_SERVER['HTTP_HOST'] . '/' . $protocol;
        $ch = curl_init();
        $data = array('chk_code' => 'nfuyrtt7HagfdkKMJEE9r8iwuq1Jndnca83hf7n2jahEekaogiujUYhG74Nsbcqplow11nvbdjHgp7', 'agg_start' => $agg_start, 'agg_end' => $agg_end, 'gf_id' => $gf_id, 'gf_pw' => $gf_pw, 'gf_formid' => $gf_formid, 'body' => $b64_html, 'body_text' => $b64_text);
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $res =  curl_exec($ch);
        curl_close($ch);

        return new JsonResponse(array('status' => $res));
    }

}
