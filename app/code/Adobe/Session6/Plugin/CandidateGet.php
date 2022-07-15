<?php

namespace Adobe\Session6\Plugin;

use Magento\Framework\Api\FilterBuilder;
use Magento\Framework\Api\SearchCriteriaBuilder;

class CandidateGet
{
    public function __construct(
        \Adobe\Session6\Api\CandidateAddressRepositoryInterface $candidateAddressRepository,
        \Adobe\Session6\Api\Data\CandidateExtensionFactory
        $candidateExtensionFactory,
        FilterBuilder $filterBuilder,
        SearchCriteriaBuilder $searchCriteriaBuilder
    ) {
        $this->candidateAddressRepository = $candidateAddressRepository;
        $this->candidateExtensionFactory = $candidateExtensionFactory;
        $this->filterBuilder = $filterBuilder;
        $this->searchCriteriaBuilder = $searchCriteriaBuilder;
    }

    public function afterGetById(\Adobe\Session6\Api\CandidateRepositoryInterface $candidateRepository, \Adobe\Session6\Api\Data\CandidateInterface $candidateInterface)
    {
        $filter = $this->filterBuilder
            ->setField('candidate_id')
            ->setValue($candidateInterface->getId())
            ->setConditionType('eq')
            ->create();
        $criteria = $this->searchCriteriaBuilder->addFilters([$filter])->create();
        $attributes = $this->candidateAddressRepository->getList($criteria)->getItems();
        $extensionAttributes = $candidateInterface->getExtensionAttributes();
        $candidateExtension = $extensionAttributes ? $extensionAttributes : $this->candidateExtensionFactory->create();
        $candidateExtension->setAddressItems($attributes);
        // $this->candidateExtensionFactory->setAddressItems($attributes);
        $candidateInterface->setExtensionAttributes($candidateExtension);
        return $candidateInterface;
    }
}
