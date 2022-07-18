<?php
namespace Adobe\Session6\Controller\Index;

class Editform extends \Magento\Framework\App\Action\Action
{
	protected $_pageFactory;
	public function __construct(
		\Magento\Framework\App\Action\Context $context,
		\Magento\Framework\View\Result\PageFactory $pageFactory)
	{
		$this->_pageFactory = $pageFactory;
		return parent::__construct($context);
	}

	public function execute()
	{
		$params=$this->getRequest()->getParams();
		return $this->_pageFactory->create();
	}
}