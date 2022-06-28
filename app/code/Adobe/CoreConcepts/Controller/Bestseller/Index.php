<?php

namespace Adobe\CoreConcepts\Controller\BestSeller;

use Magento\Framework\App\Action\Context;
use Magento\Framework\App\RequestInterface;
use Magento\Framework\View\Result\PageFactory;

/**
 * Class Index
 * @package Adobe\CoreConcepts\Controller\BestSeller
 */

class Index extends \Magento\Framework\App\Action\Action
{
    /**
     * The PageFactory to render with.
     *
     * @var PageFactory
     */
    protected $_resultsPageFactory;
 
    /**
     * Set the Context and Result Page Factory from DI.
     * @param Context     $context
     * @param PageFactory $resultPageFactory
     */
    public function __construct(
        Context $context,
        PageFactory $resultPageFactory
    ) {
        $this->_resultsPageFactory = $resultPageFactory;
        parent::__construct($context);
    }
 
    /**
     * @return \Magento\Framework\View\Result\Page
     */
    public function execute() {
        $resultPage = $this->_resultsPageFactory->create();
 
        $block = $resultPage->getLayout()
                ->createBlock('Adobe\CoreConcepts\Block\BestSeller')
                ->setTemplate('Adobe_CoreConcepts::bestsellers.phtml')
                ->toHtml();
        $this->getResponse()->setBody($block);
    }
}