<?php
/**
 *
 * Copyright © Magento. All rights reserved.
 * See COPYING.txt for license details.
 */
namespace Unit5\DataApi\Api\Data;

/**
 * Interface DataSearchResultsInterface
 * @package Unit5\DataApi\Api\Data
 */
interface DataSearchResultsInterface extends \Magento\Framework\Api\SearchResultsInterface
{
    public function getItems();

    public function setItems(array $items = null);
}