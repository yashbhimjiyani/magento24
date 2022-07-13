<?php

namespace Adobe\Session6\Plugin;

class CandidateAddressGet
{
    public function __construct(
        \Adobe\Session6\Api\CandidateRepositoryInterface $candidateRepository,
        \Adobe\Session6\Api\Data\CandidateAddressExtensionFactory
        $candidateAddressExtensionFactory
    ) {
        $this->candidateRepository = $candidateRepository;
        $this->candidateAddressExtensionFactory = $candidateAddressExtensionFactory;
    }

    public function afterGetByAddressId(\Adobe\Session6\Api\CandidateAddressRepositoryInterface $candidateAddressRepository, \Adobe\Session6\Api\Data\CandidateAddressInterface $candidateAddressInterface)
    {
        $attributes = $this->candidateRepository->getById($candidateAddressInterface->getCandidateId());
        $extensionAttributes = $candidateAddressInterface->getExtensionAttributes();
        $candidateAddressExtension = $extensionAttributes ? $extensionAttributes : $this->candidateAddressExtensionFactory->create();
        $candidateAddressExtension->setCandidateData($attributes);
        // $this->candidateExtensionFactory->setAddressItems($attributes);
        $candidateAddressInterface->setExtensionAttributes($candidateAddressExtension);
        return $candidateAddressInterface;
    }
}
