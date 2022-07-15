<?php

/**
 *
 * Copyright © Magento. All rights reserved.
 * See COPYING.txt for license details.
 */

namespace Adobe\Session6\Api;

use Magento\Framework\Api\SearchCriteriaInterface;
use Magento\Framework\Api\SearchResultsInterface;

/**
 * Interface CandidateRepositoryInterface
 */
interface CandidateRepositoryInterface
{
    /**
     * Get Candidate by Id
     *
     * @api
     * @param int $id
     * @return Data\CandidateInterface
     * @throws NoSuchEntityException If Candidate with the specified ID does not exist.
     * @throws LocalizedException
     */
    public function getById($id);

    /**
     * Retrieve Candidates which match a specified criteria.
     *
     * @param SearchCriteriaInterface $criteria
     * @return SearchResultsInterface
     */
    public function getList(SearchCriteriaInterface $criteria);

    /**
     * Get Candidates by Ids
     *
     * @param int[] $ids
     * @return Data\CandidateInterface
     * @throws NoSuchEntityException If Candidate with the specified ID does not exist.
     * @throws LocalizedException
     */
    public function getByIds($ids);
}
