<?php

namespace Adobe\Session6\Controller\Index;

use Magento\Framework\App\Action\Action;
use Magento\Framework\App\Action\Context;
use Magento\Framework\Exception\LocalizedException;
use Magento\Framework\Exception\NoSuchEntityException;
use Magento\Framework\Controller\Result\JsonFactory;
use Adobe\Session6\Api\CandidateRepositoryInterface;

class Index extends Action
{
    protected $_pageFactory;

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
        CandidateRepositoryInterface $candidateRepository
    ) {
        $this->resultJsonFactory = $resultJsonFactory;
        $this->_candidateRepository = $candidateRepository;
        return parent::__construct($context);
    }

    public function execute()
    {
        try {
            //Read a record
            $candidate = $this->_candidateRepository->getById("1");
            $resultJson = $this->resultJsonFactory->create();
            return $resultJson->setData([
                'success' => true,
                'data' => $candidate
            ]);
        } catch (NoSuchEntityException $e) {
            return $resultJson->setData([
                'sucesss' => false,
                'message' => 'No such entity Exception'
            ]);
        } catch (LocalizedException $e) {
            return $resultJson->setData([
                'sucesss' => false,
                'message' => 'Localized Exception'
            ]);
        }
    }
}
