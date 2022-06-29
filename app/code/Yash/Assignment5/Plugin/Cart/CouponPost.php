<?php

namespace Yash\Assignment5\Plugin\Cart;

class CouponPost extends \Magento\Checkout\Controller\Cart\CouponPost
{
    // public function __construct(\Magento\Checkout\Model\Cart $cart, \Magento\Framework\Escaper $escaper, \Magento\Quote\Api\CartRepositoryInterface $quoteRepository, \Magento\Framework\Message\ManagerInterface $messageManager,\Magento\Framework\Controller\Result\RedirectFactory $resultRedirectFactory)
    // {
    //     $this->cart = $cart;
    //     $this->escaper = $escaper;
    //     $this->quoteRepository = $quoteRepository;
    //     $this->messageManager = $messageManager;
    //     $this->resultRedirectFactory=$resultRedirectFactory;
    // }
    // // public function afterExecute(\Magento\Checkout\Controller\Cart\CouponPost $subject, $result)
    // // {
    // //     $couponCode = $subject->getRequest()->getParam('remove') == 1
    // //         ? ''
    // //         : trim($subject->getRequest()->getParam('coupon_code'));
    // //     // $escaper = $this->_objectManager->get(\Magento\Framework\Escaper::class);
    // //     $cartQuote = $this->cart->getQuote();
    // //     $oldCouponCode = $cartQuote->getCouponCode();
    // //     if ($oldCouponCode) {
    // //         $codeLength = strlen($oldCouponCode);
    // //         if ($codeLength) {
    // //             $cartQuote->getShippingAddress()->setCollectShippingRates(true);
    // //             $cartQuote->setCouponCode('')->collectTotals(); //Removing coupon 
    // //             $this->quoteRepository->save($cartQuote);
    // //         }
    // //     }
    // //     $this->messageManager->addErrorMessage(
    // //         __(
    // //             'The coupon code "%1" is not valid.',
    // //             $this->escaper->escapeHtml($couponCode)
    // //         )
    // //     );

    // //     $resultRedirect = $this->resultRedirectFactory->create();
    // //     $resultRedirect->setRefererUrl();
    // //     return $resultRedirect;
    // // }
    public function aroundExecute(\Magento\Checkout\Controller\Cart\CouponPost $subject, callable $proceed)
    {
        $couponCode = $this->getRequest()->getParam('remove') == 1
            ? ''
            : trim($this->getRequest()->getParam('coupon_code'));

        if($couponCode){
            $this->messageManager->addErrorMessage(
                __(
                    'The coupon code "%1" is not valid.',
                    $couponCode
                )
            );
        }else{
            $this->messageManager->addErrorMessage(
                __(
                    'The coupon code "%1" is not valid.',
                    $couponCode
                )
            );
        }
        return $this->_goBack();
    }
}
