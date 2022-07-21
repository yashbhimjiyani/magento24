<?php

namespace Adobe\PrivateContent\CustomerData;

use Magento\Customer\CustomerData\SectionSourceInterface;

use Magento\Customer\Model\Session;

class CustomSection implements SectionSourceInterface
{
    protected $customer;

    public function __construct(Session $customer)
    {
        $this->customer=$customer;
    }
    public function getSectionData()
    {
        return [
            'customdata' => $this->customer->getCustomer()->getName(),
        ];
    }
}
