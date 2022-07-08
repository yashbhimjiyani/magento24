<?php

namespace Adobe\Session6\Controller\Index;

use Magento\Framework\App\Action\Action;
use Magento\Framework\App\Action\Context;
use Adobe\Session6\Api\CandidateRepositoryInterface;
use Magento\Framework\Api\SearchCriteriaBuilder;
use Magento\Framework\Api\FilterBuilder;

class Candidates extends Action
{
    protected $_pageFactory;

    protected $_candidateRepository;

    /**
     * @var FilterBuilder
     */
    private $filterBuilder;

    /**
     * @var SearchCriteriaBuilder
     */
    private $searchCriteriaBuilder;

    /**
     * @param SearchCriteriaBuilder $searchCriteriaBuilder
     * @param FilterBuilder $filterBuilder
     */
    public function __construct(
        Context $context,
        CandidateRepositoryInterface $candidateRepository,
        SearchCriteriaBuilder $searchCriteriaBuilder,
        FilterBuilder $filterBuilder
    ) {
        $this->_candidateRepository = $candidateRepository;
        $this->searchCriteriaBuilder = $searchCriteriaBuilder;
        $this->filterBuilder = $filterBuilder;
        return parent::__construct($context);
    }

    public function execute()
    {
        $candidates = $this->_candidateRepository->getByIds(['1','2']);
        foreach($candidates as $candidate){
            echo "<pre>";
            print_r($candidate->getData());
        }
        exit;
        

        // $filter = $this->filterBuilder
        //     ->setField('id')
        //     ->setValue(array(1, 3))
        //     ->setConditionType('in')
        //     ->create();
        // $criteria = $this->searchCriteriaBuilder->addFilters([$filter])->create();
        // $candidates = $this->_candidateRepository->getList(
        //     $criteria
        // )->getItems();
        // foreach ($candidates as $candidate) {
        //     echo "<pre>";
        //     print_r($candidate->getData());
        // }
        // exit;
    }
}
