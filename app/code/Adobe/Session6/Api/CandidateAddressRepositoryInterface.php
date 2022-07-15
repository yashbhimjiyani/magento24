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
 * Interface CandidateAddressRepositoryInterface
 */
interface CandidateAddressRepositoryInterface
{
    /**
     * Get Candidate Address by Address Id
     *
     * @api
     * 
     * @param int $addressId
     * 
     * @return Data\CandidateAddressInterface
     * 
     * @throws NoSuchEntityException If Candidate Address with the specified Address ID does not exist.
     * @throws LocalizedException
     */
    public function getByAddressId($addressId);

    /**
     * Get Candidate Address by Candidate Id
     *
     * @api
     * 
     * @param int $candidateId
     * 
     * @return Data\CandidateAddressInterface
     * 
     * @throws NoSuchEntityException If Candidate Address with the specified Candidate ID does not exist.
     * @throws LocalizedException
     */
    public function getByCandidateId($candidateId);
    /**
     * Retrieve Candidates Addresses which match a specified criteria.
     *
     * @param SearchCriteriaInterface $criteria
     * @return SearchResultsInterface
     */
    public function getList(SearchCriteriaInterface $criteria);
}
