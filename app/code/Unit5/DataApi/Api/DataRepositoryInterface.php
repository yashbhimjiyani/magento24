<?php
/**
 *
 * Copyright © Magento. All rights reserved.
 * See COPYING.txt for license details.
 */
namespace Unit5\DataApi\Api;

use Magento\Framework\Api\SearchCriteriaInterface;

/**
 * Interface DataDataApiInterface
 * @package Unit5\DataApi\Api
 */
interface DataRepositoryInterface
{
    /**
     * @return Data\DataSearchResultsInterface
     */
    public function getList(SearchCriteriaInterface $searchCriteria);
}