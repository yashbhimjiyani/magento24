<?php

namespace Adobe\Session6\Plugin;

class CandidateGet
{
    public function __construct(
        \Adobe\Session6\Api\CandidateAddressRepositoryInterface $candidateAddressRepository,
        \Adobe\Session6\Api\Data\CandidateExtensionFactory
         $candidateExtensionFactory
    )
    {
        $this->candidateAddressRepository=$candidateAddressRepository;
        $this->candidateExtensionFactory=$candidateExtensionFactory;
    }

    public function afterGetById(\Adobe\Session6\Api\CandidateRepositoryInterface $candidateRepository,\Adobe\Session6\Api\Data\CandidateInterface $candidateInterface){
        $attributes=$this->candidateAddressRepository->getByCandidateId($candidateInterface->getId());
        $extensionAttributes=$candidateInterface->getExtensionAttributes();
        $candidateExtension=$extensionAttributes ? $extensionAttributes : $this->candidateExtensionFactory->create();
        $candidateExtension->setAddressItems($attributes);
        // $this->candidateExtensionFactory->setAddressItems($attributes);
        $candidateInterface->setExtensionAttributes($candidateExtension);
        return $candidateInterface;
    }
}