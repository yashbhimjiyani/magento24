<?php

namespace Adobe\Session6\Block\Candidates;

use Adobe\Session6\Api\CandidateRepositoryInterface;
use Magento\Framework\Api\FilterBuilder;
use Magento\Framework\Api\SearchCriteriaBuilder;

class CandidateList extends \Magento\Framework\View\Element\Template
{
    public function __construct(
        \Magento\Framework\View\Element\Template\Context $context,
        CandidateRepositoryInterface $candidateRepositoryInterface,
        FilterBuilder $filterBuilder,
        SearchCriteriaBuilder $searchCriteriaBuilder
    ) {
        parent::__construct($context);
        $this->candidateRepositoryInterface = $candidateRepositoryInterface;
        $this->filterBuilder = $filterBuilder;
        $this->searchCriteriaBuilder = $searchCriteriaBuilder;
    }

    public function getCandidates()
    {
        $criteria = $this->searchCriteriaBuilder->create();
        $candidates = $this->candidateRepositoryInterface->getList($criteria)->getItems();
        return $candidates;
    }
}
