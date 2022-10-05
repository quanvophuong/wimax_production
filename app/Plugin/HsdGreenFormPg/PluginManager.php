<?php

namespace Plugin\HsdGreenFormPg;

use Eccube\Plugin\AbstractPluginManager;
use Symfony\Component\Filesystem\Filesystem;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Eccube\Entity\Master\DeviceType;
use Eccube\Entity\Layout;
use Eccube\Repository\BlockPositionRepository;
use Eccube\Entity\BlockPosition;
use Eccube\Repository\Master\DeviceTypeRepository;
use Eccube\Repository\BlockRepository;
use Eccube\Repository\LayoutRepository;

class PluginManager extends AbstractPluginManager
{

    const BLOCKNAME = "HsdGreenFormプラグイン";
    const BLOCKFILENAME = "green_form";
    const JSFILENAME = "hsd_swiper.min";
    const CSSFILENAME = "hsd_swiper.min";
    private $block;
    private $js;
    private $css;

    public function __construct()
    {
        $this->block = sprintf("%s/Resource/template/default/Block/%s.twig", __DIR__, self::BLOCKFILENAME);
        $this->js = sprintf("%s/Resource/template/default/js/%s.js", __DIR__, self::JSFILENAME);
        $this->css = sprintf("%s/Resource/template/default/js/%s.css", __DIR__, self::CSSFILENAME);
    }

    public function uninstall(array $meta, ContainerInterface $container)
    {
        $this->removeBlock($container);
    }

    public function enable(array $meta, ContainerInterface $container)
    {
        $is_registered = 0; // 0:まだBlockを登録していない

        // ブロックのデータがすでに作成されている場合は新しいブロックを作らない
        $is_registered = $this->copyBlock($container);
        $Block = $container->get(BlockRepository::class)->findOneBy(['file_name' => self::BLOCKFILENAME]);
        if( $is_registered == 0 ) {
            // プラグイン有効時で新規にBlockを作成する際にGreenFormに新規ユーザを作成
            $protocol = 'http';
            if( array_key_exists('HTTPS', $_SERVER) && $_SERVER['HTTPS'] == 'on' ){
                $protocol = 'https';
            }

            // 導線調査のため、一旦、会員登録は行わない
            $url = 'https://greenform.jp/gfapi/adduser/' . $_SERVER['HTTP_HOST'] . '/' . $protocol;
            $ch = curl_init();
            $data = array('chk_code' => 'naBvafdg63j87Nbfg1gBvApmgqit2mNZs8Jhfb1wqkmnghyNhdg5fc3BGFabz8h7');
            curl_setopt($ch, CURLOPT_URL, $url);
            curl_setopt($ch, CURLOPT_POST, true);
            curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
            $res =  curl_exec($ch);
            curl_close($ch);

        }
    }

    /**
     * ブロックファイルなどをブロックディレクトリにコピーしてDBに登録
     *
     * @param $app
     * @throws \Exception
     */
    private function copyBlock($container)
    {
        $is_registered = 0; // 0:まだBlockを登録していない

        $this->container = $container;
        $templateDir = $container->getParameter('eccube_theme_front_dir');
        $htmlDir = $container->getParameter('eccube_html_front_dir') . '/assets';

        $file = new Filesystem();

        if (!$file->exists($templateDir.'/Block/'.self::BLOCKFILENAME.'.twig')) {
            $file->copy($this->block, $templateDir.'/Block/'. self::BLOCKFILENAME . '.twig');
        }

        // js, cssのコピー
        $file->copy($this->css, $htmlDir . '/css/' . self::CSSFILENAME . '.css');
        $file->copy($this->js, $htmlDir . '/js/' . self::JSFILENAME . '.js');

        // ブロックの登録
        $em = $container->get('doctrine.orm.entity_manager');
        $em->getConnection()->beginTransaction();
        try {
            $is_registered = $this->registerBlock();
            // $this->registerBlockPosition($Block); // レイアウトへはブロックを追加しない
            $em->getConnection()->commit();
        } catch (\Exception $e) {
            $em->getConnection()->rollback();
            throw $e;
        }

        return $is_registered;
    }

    /**
     * ブロックを削除
     *
     * @param $app
     * @throws \Exception
     */
    private function removeBlock($container)
    {
        $templateDir = $container->getParameter('eccube_theme_front_dir');
        $htmlDir = $container->getParameter('eccube_html_front_dir') . 'assets';

        // ブロックファイルを削除
        $file = new Filesystem();
        $file->remove($templateDir.'/Block/'. self::BLOCKFILENAME . '.twig');

        // js, css を削除
        $file->remove($htmlDir . '/css/' . self::CSSFILENAME . '.css');
        $file->remove($htmlDir . '/js/' . self::JSFILENAME . '.js');

        // Blockの取得(file_nameはアプリケーションの仕組み上必ずユニーク)
        /** @var \Eccube\Entity\Block $Block */
        $Block = $container->get(BlockRepository::class)->findOneBy(array('file_name' => self::BLOCKFILENAME));
        if ($Block)
        {
            $em = $container->get('doctrine.orm.entity_manager');
            $em->getConnection()->beginTransaction();
            try {
                // BlockPositionの削除
                $blockPositions = $Block->getBlockPositions();
                /** @var \Eccube\Entity\BlockPosition $BlockPosition */
                foreach ($blockPositions as $BlockPosition)
                {
                    $Block->removeBlockPosition($BlockPosition);
                    $em->remove($BlockPosition);
                }
                // Blockの削除
                $em->remove($Block);
                $em->flush();
                $em->getConnection()->commit();
            } catch (\Exception $e) {
                $em->getConnection()->rollback();
                throw $e;
            }
        }
        //Cache::clear($app, false);
    }

    /**
     * ブロックの登録
     *
     * @return \Eccube\Entity\Block
     */
    private function registerBlock()
    {
        $ret_val = 0;
        $em = $this->container->get('doctrine.orm.entity_manager');

        /** @var \Eccube\Repository\Master\DeviceTypeRepository $deviceTypeRepository */

        // Blockがまだ登録されていなかったら登録
        $stmt = $em->getConnection()->prepare('select id from dtb_block where file_name = :file_name');
        $stmt->execute(array('file_name' => self::BLOCKFILENAME));
        $rs_block_id = $stmt->fetchAll();
        if( count($rs_block_id) > 0 && isset($rs_block_id[0]['id']) ){
            // Blockが登録されているため処理しない
            $ret_val = 1;
        }else{
            $DeviceType = $this->container->get(DeviceTypeRepository::class)->find(DeviceType::DEVICE_TYPE_PC);
            /** @var \Eccube\Entity\Block $Block */
            $Block = $this->container->get(BlockRepository::class)->newBlock($DeviceType);

            $Block->setName(self::BLOCKNAME);
            $Block->setFileName(self::BLOCKFILENAME);
            $Block->setUseController(true);
            $Block->setDeletable(false);
            $em->persist($Block);
            $em->flush($Block);
        }

        return $ret_val;
    }

    /**
     * BlockPositionの登録
     *
     * @param $Block
     */
    private function registerBlockPosition($Block)
    {
        $em = $this->container->get('doctrine.orm.entity_manager');
        $blockPos = $this->container->get(BlockPositionRepository::class)->findOneBy(
            ['section' => Layout::TARGET_ID_MAIN_BOTTOM, 'layout_id' => Layout::DEFAULT_LAYOUT_UNDERLAYER_PAGE],
            ['block_row' => 'DESC']
        );
        $BlockPosition = new BlockPosition();

        // ブロックの順序を変更
        $BlockPosition->setBlockRow(1);
        if ($blockPos) {
            $blockRow = $blockPos->getBlockRow() + 1;
            $BlockPosition->setBlockRow($blockRow);
        }

        $PageLayout = $this->container->get(LayoutRepository::class)->find(Layout::DEFAULT_LAYOUT_UNDERLAYER_PAGE);
        $BlockPosition->setLayout($PageLayout);
        $BlockPosition->setLayoutId($PageLayout->getId());
        $BlockPosition->setSection(Layout::TARGET_ID_MAIN_BOTTOM);
        $BlockPosition->setBlock($Block);
        $BlockPosition->setBlockId($Block->getId());
        $em->persist($BlockPosition);
        $em->flush($BlockPosition);
    }

}

?>
