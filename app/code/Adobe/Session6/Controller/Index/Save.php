<?php

namespace Adobe\Session6\Controller\Index;

use Magento\Framework\Exception\CouldNotSaveException;

class Save extends \Magento\Framework\App\Action\Action
{
    protected $candidateInterface;
    protected $candidateRepositoryInterface;
    public function __construct(
        \Magento\Framework\App\Action\Context $context,
        \Adobe\Session6\Model\CandidateFactory $candidateFactory,
        \Adobe\Session6\Api\Data\CandidateInterface $candidateInterface,
        \Adobe\Session6\Api\CandidateRepositoryInterface $candidateRepositoryInterface
    ) {
        $this->candidateFactory = $candidateFactory;
        $this->candidateInterface = $candidateInterface;
        $this->candidateRepositoryInterface = $candidateRepositoryInterface;
        return parent::__construct($context);
    }
    public function execute()
    {
        // echo "<pre>";
        // print_r(get_class_methods($this->candidateRepositoryInterface));
        // exit;
        // $candidateRepo=$this->candidateRepositoryInterface->create();
        $data = $this->getRequest()->getParams();
        // $candidateRepo->setName($data['name']);
        // $candidateRepo->setDob($data['dob']);
        // $candidateRepo->setIsActive($data['is_active']);
        // $candidateRepo->setIsIndianCitizen($data['is_indian_citizen']);
        // var_dump($data);die();
        $candidateModel = $this->candidateFactory->create();
        $candidateModel->setName($data['name']);
        $candidateModel->setDob($data['dob']);
        if (isset($data['is_active'])) {
            $candidateModel->setIsIndianCitizen($data['is_active']);
        } else {
            $candidateModel->setIsIndianCitizen($data['is_active_unchecked']);
        }
        if (isset($data['is_indian'])) {
            $candidateModel->setIsIndianCitizen($data['is_indian']);
        } else {
            $candidateModel->setIsIndianCitizen($data['is_indian_unchecked']);
        }

        // $this->candidateInterface->setName($data['name']);
        // $this->candidateInterface->setDob($data['dob']);
        // $this->candidateInterface->setIsActive($data['is_active']);
        // $this->candidateInterface->setIsIndianCitizen($data['is_indian_citizen']);
        try {
            $this->candidateRepositoryInterface->save($candidateModel);
            $this->messageManager->addSuccessMessage(__('You saved the data.'));
        } catch (CouldNotSaveException $e) {
            $this->messageManager->addErrorMessage(__('Data was not saved.'));
            echo $e->getMessage();
        }
        $resultRedirect = $this->resultRedirectFactory->create();
        $resultRedirect->setPath('candidates/index/display');
        return $resultRedirect;
    }
}
