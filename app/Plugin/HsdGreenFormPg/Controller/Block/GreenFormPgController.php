<?php

namespace Plugin\HsdGreenFormPg\Controller\Block;

use Eccube\Controller\AbstractController;
use Plugin\HsdGreenFormPg\Repository\ConfigRepository;
use Symfony\Component\HttpFoundation\Request;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Eccube\Security\Core\Encoder\PasswordEncoder;
use Eccube\Common\EccubeConfig;
use Eccube\Util\StringUtil;


class GreenFormPgController extends AbstractController
{
    private $_configRepository;

    //タイトル
    private $_title = 'HSDGreenFormプラグイン';

    // GreenForm ID
    private $_greenform_id = '';

    // フォーム高さ
    private $_form_height = 500; // default

    // 処理するフォーム数
    private $_form_count = 15;

    /**
     * GreenFormController constructor.
     *
     * @param ConfigRepository $configRepository
     */
    public function __construct(ConfigRepository $configRepository)
    {
        $this->_configRepository = $configRepository;
    }

    /**
     * @Route("block_green_form", name="block_green_form")
     * @Template("@Block/green_form.twig")
     */
    public function index(Request $request)
    {
        /*
         * メールアドレスがポストされている場合は、
         * 会員登録連携として下記の処理を実施。
         *
         */
        if( isset($_POST['greenform_email']) ){
            $em = $this->entityManager;

            // GreenForm連携
            $sei = htmlspecialchars($_POST['greenform_sei'], ENT_QUOTES, 'UTF-8');
            $mei = htmlspecialchars($_POST['greenform_mei'], ENT_QUOTES, 'UTF-8');
            $email = htmlspecialchars($_POST['greenform_email'], ENT_QUOTES, 'UTF-8');
            $postcode = '1100001';
            $pref_num = 13;
            $pref = '東京都';
            $address = '台東区谷中1-1';
            $gf_tel = '0311112222';
            $gf_gender = '';
            $gf_gender_num = 1; // デフォルト：男性
            if( isset($_POST['greenform_postcode']) && !empty($_POST['greenform_postcode']) ){
                $postcode = htmlspecialchars($_POST['greenform_postcode'], ENT_QUOTES, 'UTF-8');
            }
            if( isset($_POST['greenform_pref']) && !empty($_POST['greenform_pref']) ){
                $pref = htmlspecialchars($_POST['greenform_pref'], ENT_QUOTES, 'UTF-8');
            }
            if( isset($_POST['greenform_address']) && !empty($_POST['greenform_address']) ){
                $address = htmlspecialchars($_POST['greenform_address'], ENT_QUOTES, 'UTF-8');
            }
            if( isset($_POST['greenform_tel']) && !empty($_POST['greenform_tel']) ){
                $gf_tel = htmlspecialchars($_POST['greenform_tel'], ENT_QUOTES, 'UTF-8');
            }
            if( isset($_POST['greenform_gender']) && !empty($_POST['greenform_gender']) ){
                $gf_gender = htmlspecialchars($_POST['greenform_gender'], ENT_QUOTES, 'UTF-8');
            }
            $not_ref_send_id = htmlspecialchars($_POST['not_ref_send_id'], ENT_QUOTES, 'UTF-8');

            if( $_SESSION['hsd_greenform'] == $not_ref_send_id ) {
                // dtb_customerに「仮会員」として新規に登録
                if (!empty($email)) {
                    if (empty($sei)) {
                        $sei = '姓登録なし';
                    }
                    if (empty($sei)) {
                        $mei = '名登録なし';
                    }
                    // 都道府県番号を取得
                    $stmt_pref = $em->getConnection()->prepare("select id from mtb_pref where name = :pref_str");
                    $stmt_pref->bindValue('pref_str', $pref);
                    $stmt_pref->execute();
                    $rs_pref = $stmt_pref->fetchAll();
                    if( count($rs_pref) > 0 ){
                        $pref_num = $rs_pref[0]['id'];
                    }
                    // 性別を取得
                    $stmt_gender = $em->getConnection()->prepare("select id from mtb_sex where name = :gender_str");
                    $stmt_gender->bindValue('gender_str', $gf_gender);
                    $stmt_gender->execute();
                    $rs_gender = $stmt_gender->fetchAll();
                    if( count($rs_gender) > 0 ){
                        $gf_gender_num = $rs_gender[0]['id'];
                    }

                    $eccubeConfig = $this->container->get(EccubeConfig::class);
                    $peobj = new PasswordEncoder($eccubeConfig);
                    $salt = $peobj->createSalt();
                    $pw = $peobj->encodePassword('greenform', $salt);
                    $secret_key = StringUtil::random(32);

                    $stmt = $em->getConnection()->prepare("
                    insert into dtb_customer values(
                    NULL,
                    1,
                    :in_gender,
                    NULL,
                    NULL,
                    :in_pref_num,
                    :sei,
                    :mei,
                    :dummy_kana1,
                    :dummy_kana2,
                    '',
                    :in_postcode,
                    :in_address,
                    '',
                    :email,
                    :in_tel,
                    NULL,
                    :pw,
                    :salt,
                    :secret_key,
                    NULL,
                    NULL,
                    0,
                    0.00,
                    'GreenFormからの登録者',
                    NULL,
                    NULL,
                    0,
                    :now_date,
                    :now_date,
                    'customer'
                    )");
                    $stmt->bindValue('in_gender', $gf_gender_num);
                    $stmt->bindValue('sei', $sei);
                    $stmt->bindValue('mei', $mei);
                    $stmt->bindValue('dummy_kana1', 'ダミーセイ');
                    $stmt->bindValue('dummy_kana2', 'ダミーメイ');
                    $stmt->bindValue('email', $email);

                    $stmt->bindValue('in_postcode', $postcode);
                    //$stmt->bindValue('in_pref', $pref); // 都道府県の文字列表記
                    $stmt->bindValue('in_pref_num', $pref_num);
                    $stmt->bindValue('in_address', $address);
                    $stmt->bindValue('in_tel', $gf_tel);

                    $stmt->bindValue('pw', $pw);
                    $stmt->bindValue('salt', $salt);
                    $stmt->bindValue('secret_key', $secret_key);
                    $stmt->bindValue('now_date', date('Y-m-d H:i:s'));
                    $stmt->execute();
                }
            }
            unset($_SESSION['hsd_greenform']);
        }

        // 会員情報連携用で二重送信防止用のIDを設定
        $not_ref_send_id = uniqid();
        $_SESSION['hsd_greenform'] = $not_ref_send_id;

        /*
         * 当該ページのGreenFormIDを設定
         */
        $setting = $this->_configRepository->get();
        $request_stack = $this->get('request_stack')->getMasterRequest();
        $chkpath = explode('/', $request_stack->getPathInfo());
        if( count($chkpath) == 2 && empty($chkpath[1]) ){
            /*
             * $chkpath の数が2で、emptyならトップページとみなす
             */
            for($i = 1; $i <= $this->_form_count; $i++){
                if( $setting['route_' . $i] == 'homepage' ){
                    if( !empty($setting['greenform_id_' . $i]) ){
                        $this->_greenform_id = $setting['greenform_id_' . $i];
                    }
                    if( !empty($setting['form_height_' . $i]) ){
                        $this->_form_height = $setting['form_height_' . $i];
                    }
                }
            }
        }else{
            /*
             * トップページ以外
             */
            if( isset($chkpath[1]) && isset($chkpath[2]) ){
                $p1 = $chkpath[1];
                $p2 = $chkpath[2];
                if( !empty($p1) && !empty($p2) ){
                    $p1_len = strlen($p1);
                    $p2_len = strlen($p2);
                    if( $p1[$p1_len-1] == 's' ){
                        $p1 = substr($p1, 0, $p1_len-1);
                    }
                    if( $p2[$p2_len-1] == 's' ){
                        $p2 = substr($p2, 0, $p2_len-1);
                    }
                    for($i = 1; $i <= $this->_form_count; $i++){
                        if( $setting['route_' . $i] == $p1 . '_' . $p2 ){
                            if( !empty($setting['greenform_id_' . $i]) ){
                                $this->_greenform_id = $setting['greenform_id_' . $i];
                            }
                            if( !empty($setting['form_height_' . $i]) ){
                                $this->_form_height = $setting['form_height_' . $i];
                            }
                        }
                    }
                }
            }
        }

        return $this->render(
            'Block/green_form.twig',
            array(
                'greenform_id' => $this->_greenform_id,
                'form_height' => $this->_form_height,
                'not_ref_send_id' => $not_ref_send_id
            )
        );

    }

}
