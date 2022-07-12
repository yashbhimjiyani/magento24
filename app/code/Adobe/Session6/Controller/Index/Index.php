<?php

namespace Adobe\Session6\Controller\Index;

use Magento\Framework\App\Action\Action;
use Magento\Framework\App\Action\Context;
use Magento\Framework\Exception\LocalizedException;
use Magento\Framework\Exception\NoSuchEntityException;
use Magento\Framework\Controller\Result\JsonFactory;
use Adobe\Session6\Api\CandidateRepositoryInterface;
use Adobe\Session6\Model\CandidateFactory;

class Index extends Action
{
    protected $_candidateRepository;

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
        CandidateRepositoryInterface $candidateRepository,
        CandidateFactory $candidateFactory
    ) {
        $this->resultJsonFactory = $resultJsonFactory;
        $this->_candidateRepository = $candidateRepository;
        $this->candidateFactory = $candidateFactory;
        return parent::__construct($context);
    }

    public function execute()
    {
        $resultJson = $this->resultJsonFactory->create();
        try {
            $collection=$this->_candidateRepository->getById('1');
            var_dump($collection);die();
            //Read a record
            $candidate = $this->_candidateRepository->getById('1');
            $data = $candidate->getData();
            return $resultJson->setData([
                'success' => true,
                'data' => $data
            ]);
        } catch (NoSuchEntityException $e) {
            return $resultJson->setData([
                'sucesss' => false,
                'message' => 'No such entity Exception'
            ]);
        } catch (LocalizedException $e) {
            return $resultJson->setData([
                'sucesss' => false,
                'message' => $e->getLogMessage()
            ]);
        }
    }
}
