<?php

namespace Yash\Assignment5\Plugin;

use Magento\Framework\Exception\LocalizedException;
use Magento\Framework\Exception\CouldNotSaveException;
use Magento\Framework\Exception\NoSuchEntityException;

class CouponManagement extends \Magento\Quote\Model\CouponManagement
{
    public function aroundSet(\Magento\Quote\Model\CouponManagement $subject, $cartId, $couponCode)
    {
        throw new NoSuchEntityException(__("The coupon code isn't valid. Verify the code and try again."));
        return true;
    }
}
