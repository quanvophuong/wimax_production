<?php
/**
 * Created by PhpStorm.
 * User: nori
 * Date: 2019-11-22
 * Time: 09:34
 */

namespace Plugin\HsdGreenFormPg\EventListener;

use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Eccube\Event\EccubeEvents;
use Eccube\Event\EventArgs;
use Plugin\HsdGreenFormPg\Repository\ConfigRepository;

class GreenformListener implements EventSubscriberInterface
{
    /**
     * @var EntityManagerInterface
     */
    protected $entityManager;
    private $_configRepository;

    /**
     * OrderEditIndexCompleteListener constructor.
     *
     * @param EntityManagerInterface $entityManager
     */
    public function __construct(EntityManagerInterface $entityManager, ConfigRepository $configRepository) {
        $this->entityManager = $entityManager;
        $this->_configRepository = $configRepository;
    }

    public static function getSubscribedEvents(): array
    {
        return [
            EccubeEvents::FRONT_SHOPPING_COMPLETE_INITIALIZE => 'onFrontShoppingCompleteInitialize',
        ];
        /*
        return [
            KernelEvents::RESPONSE => 'onShoopingComplete',
        ];
        */
    }

    public function onFrontShoppingCompleteInitialize(EventArgs $event)
    {
        $setting = $this->_configRepository->get();
        if( $setting != null && $setting->getOrderToGreenformreg() == 'reg' ){
            $order = $event->getArgument("Order");
            $sei = $order->getName01();
            $mei = $order->getName02();
            $mail = $order->getEmail();

            // 受注完了時に氏名、メアドをGreenFormの顧客リストに登録する場合
            // ひとまず、メアドがあれば登録する。
            $form_id = $setting->getOgGreenformId();
            if( !empty($form_id) && !empty($mail) ){
                // トークンを取得
                $domain = $_SERVER['HTTP_HOST'];

                $tourl = 'https://greenform.jp/lm/get_eccube_token';
                $data = array(
                    'domain' => $domain
                );
                $r = http_build_query($data);
                $options = array(
                    'http' => array(
                        'method' => 'POST',
                        'content' => $r,
                        'header' => array(
                            'Content-type: application/x-www-form-urlencoded',
                            'User-Agent: Mozilla/5.0 (Windows NT 5.1; rv:13.0) Gecko/20100101 Firefox/13.0.1'
                        ),
                        'ignore_errors' => true,
                        'protocol_version' => '1.1'
                    ),
                    'ssl' => array(
                        'verify_peer' => false,
                        'verify_peer_name' => false
                    )
                );
                $token = file_get_contents($tourl, false, stream_context_create($options));
                if( !empty($token) ){
                    /*
                     * トークン取得済み
                     */
                    // メールアドレスなどを保存
                    $tourl = 'https://greenform.jp/lm/reg_addr';
                    $data = array(
                        'token' => $token,
                        'form_url' => $form_id,
                        'sei' => $sei,
                        'mei' => $mei,
                        'mail' => $mail
                    );
                    $r = http_build_query($data);
                    $options = array(
                        'http' => array(
                            'method' => 'POST',
                            'content' => $r,
                            'header' => array(
                                'Content-type: application/x-www-form-urlencoded',
                                'User-Agent: Mozilla/5.0 (Windows NT 5.1; rv:13.0) Gecko/20100101 Firefox/13.0.1'
                            ),
                            'ignore_errors' => true,
                            'protocol_version' => '1.1'
                        ),
                        'ssl' => array(
                            'verify_peer' => false,
                            'verify_peer_name' => false
                        )
                    );
                    $ret_val = file_get_contents($tourl, false, stream_context_create($options));
                }
            }
        }
    }
}

?>