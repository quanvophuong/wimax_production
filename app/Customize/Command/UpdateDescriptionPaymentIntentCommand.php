<?php

namespace Customize\Command;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Plugin\StripeRec\Entity\StripeRecOrder;
use Carbon\Carbon;

class UpdateDescriptionPaymentIntentCommand extends Command
{
    protected static $defaultName = "striperec:update_description_payment_intent";

    protected $container;
    protected $entityManager;
    protected $recService;

    public function __construct(
        ContainerInterface $container
    )
    {
        $this->container = $container;
        $this->entityManager = $container->get('doctrine.orm.entity_manager');
        $this->recService = $container->get("plg_stripe_rec.service.recurring_service");
        parent::__construct();
    }

    protected function execute(InputInterface $input, OutputInterface $output) {
        $pageLayoutRepository = $this->entityManager->getRepository(StripeRecOrder::class);
        $dataSearchs = $pageLayoutRepository->getQueryBuilderBySearchDataForAdmin([
            'is_pause_subscriptions' => false
        ]);

        foreach ($dataSearchs->getQuery()->getResult() as $dataSearch) {
            $res = $this->recService->updateDescriptionPaymentIntent($dataSearch);
            if(!empty($res)){
                continue;
            }
        }

        return true;
    }
}
