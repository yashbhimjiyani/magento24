<?php
/**
 *
 * Copyright © Magento. All rights reserved.
 * See COPYING.txt for license details.
 */
namespace Unit5\DataApi\Model;

use Magento\Framework\Model\AbstractModel;
use Magento\Framework\Model\Context;

class DataApi extends AbstractModel
{
    public function __construct(
        \Magento\Framework\Model\Context $context,
        \Magento\Framework\Registry $registry,
        \Magento\Framework\Model\ResourceModel\AbstractResource $resource = null,
        \Magento\Framework\Data\Collection\AbstractDb $resourceCollection = null,
        array $data = []
    )
    {
        parent::__construct($context, $registry, $resource, $resourceCollection, $data);
    }

    /**
     * Model constructor
     */
    protected function _construct()
    {
        $this->_init(ResourceModel\DataApi::class);
    }
}