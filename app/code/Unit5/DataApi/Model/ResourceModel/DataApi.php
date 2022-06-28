<?php
/**
 *
 * Copyright © Magento. All rights reserved.
 * See COPYING.txt for license details.
 */
namespace Unit5\DataApi\Model\ResourceModel;

class DataApi extends \Magento\Framework\Model\ResourceModel\Db\AbstractDb
{
    /**
     * init
     */
    protected function _construct()
    {
        $this->_init('unit5_category_country', 'catalog_category_id');
    }
}