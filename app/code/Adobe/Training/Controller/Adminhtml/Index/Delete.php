<?php
/**
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 *
 * Created By : Yash B
 */
namespace Adobe\Training\Controller\Adminhtml\Index;

use Magento\Backend\App\Action;
use Magento\Backend\App\Action\Context;

class Delete extends Action
{

    /**
     * @var \Adobe\Training\Model\Blog
     */
    protected $blog;

    /**
     * @param Context                  $context
     * @param \Adobe\Training\Model\Blog $blog
     */
    public function __construct(
        Context $context,
        \Adobe\Training\Model\Blog $blog
    ) {
        parent::__construct($context);
        $this->blog = $blog;
    }

    /**
     * {@inheritdoc}
     */
    protected function _isAllowed()
    {
        return $this->_authorization->isAllowed('Adobe_Training::index_delete');
    }

    /**
     * Delete action
     *
     * @return \Magento\Framework\Controller\ResultInterface
     */
    public function execute()
    {
        $id = $this->getRequest()->getParam('id');
        /** @var \Magento\Backend\Model\View\Result\Redirect $resultRedirect */
        $resultRedirect = $this->resultRedirectFactory->create();
        if ($id) {
            try {
                $model = $this->blog;
                $model->load($id);
                $model->delete();
                $this->messageManager->addSuccess(__('Blog deleted successfully.'));
                return $resultRedirect->setPath('*/*/');
            } catch (\Exception $e) {
                $this->messageManager->addError($e->getMessage());
                return $resultRedirect->setPath('*/*/edit', ['id' => $id]);
            }
        }
        $this->messageManager->addError(__('Blog does not exist.'));
        return $resultRedirect->setPath('*/*/');
    }
}