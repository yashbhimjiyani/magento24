<?php

namespace Adobe\Session6\Controller\Index;

use Magento\Framework\App\Action\Action;
use Magento\Framework\App\Action\Context;
use Adobe\Session6\Model\ResourceModel\Candidate\Collection;
use Magento\Framework\Controller\Result\JsonFactory;

class Addresses extends Action
{
    protected $collection;

    /**
     * @var JsonFactory
     */
    private $resultJsonFactory;
    /**
     * @param JsonFactory $resultJsonFactory
     */
    public function __construct(
        Context $context,
        JsonFactory $resultJsonFactory,
        Collection $collection
    ) {
        $this->resultJsonFactory = $resultJsonFactory;
        $this->collection = $collection;
        return parent::__construct($context);
    }

    public function execute()
    {
        $resultJson = $this->resultJsonFactory->create();
        $this->collection->getSelect()->join(
            ['secondTable' => $this->collection->getTable('candidates_addresses')],
            'main_table.id=secondTable.candidate_id',
        )->where('main_table.id=3');
        return $resultJson->setData([
            'success' => true,
            'data' => $this->collection->getData()
        ]);
    }
}
