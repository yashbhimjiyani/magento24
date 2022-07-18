<?php

namespace Adobe\Session6\Controller\Index;

use Magento\Framework\Exception\CouldNotSaveException;

class Update extends \Magento\Framework\App\Action\Action
{
    protected $candidateInterface;
    protected $candidateRepositoryInterface;
    public function __construct(
        \Magento\Framework\App\Action\Context $context,
        \Adobe\Session6\Model\CandidateFactory $candidateFactory,
        \Adobe\Session6\Api\Data\CandidateInterface $candidateInterface,
        \Adobe\Session6\Api\CandidateRepositoryInterface $candidateRepositoryInterface
    ) {
        $this->candidateFactory=$candidateFactory;
        $this->candidateInterface = $candidateInterface;
        $this->candidateRepositoryInterface = $candidateRepositoryInterface;
        return parent::__construct($context);
    }
    public function execute()
    {
        $data = $this->getRequest()->getParams();
        // echo "<pre>";
        // print_r($data);
        // exit;
        $candidateRepo=$this->candidateRepositoryInterface->getById($data['id']);
        $candidateRepo->setName($data['name']);
        $candidateRepo->setDob($data['dob']);
        if (isset($data['is_active'])) {
            $candidateRepo->setIsActive(1);
        } else {
            $candidateRepo->setIsActive(0);
        }
        if (isset($data['is_indian'])) {
            $candidateRepo->setIsIndianCitizen(1);
        } else {
            $candidateRepo->setIsIndianCitizen(0);
        }
        try {
            $this->candidateRepositoryInterface->save($candidateRepo);
            $this->messageManager->addSuccessMessage(__('You Updated the data.'));
        } catch (CouldNotSaveException $e) {
            $this->messageManager->addErrorMessage(__('Data were not Updated.'));
            echo $e->getMessage();
        }
        $resultRedirect = $this->resultRedirectFactory->create();
        $resultRedirect->setPath('candidates/index/display');
        return $resultRedirect;
    }
}
