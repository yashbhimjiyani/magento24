<?php

namespace Adobe\Session6\Api\Data;

use Magento\Framework\Api\SearchResultsInterface;

/**
 * @api
 */
interface CandidateSearchResultInterface extends SearchResultsInterface
{
    /**
     * Get items
     * @return \Adobe\Session6\Api\Data\CandidateInterface[]
     */
    public function getItems();

    /**
     * Set items
     * @param \Adobe\Session6\Api\Data\CandidateInterface[] $items
     * @return $this
     */
    public function setItems(array $items);
}
