<?php

namespace Yash\Assignment5\Plugin\Cart;

class CouponPost extends \Magento\Checkout\Controller\Cart\CouponPost
{
    public function aroundExecute(\Magento\Checkout\Controller\Cart\CouponPost $subject, callable $proceed)
    {
        $couponCode = $this->getRequest()->getParam('remove') == 1
            ? ''
            : trim($this->getRequest()->getParam('coupon_code'));

        if ($couponCode) {
            $this->messageManager->addErrorMessage(
                __(
                    'The coupon code "%1" is not valid.',
                    $couponCode
                )
            );
        } else {
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
