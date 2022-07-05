<?php
/**
 *
 * Copyright © Magento. All rights reserved.
 * See COPYING.txt for license details.
 */
namespace Adobe\Session6\Api;

use Magento\Framework\Api\SearchCriteriaInterface;

/**
 * Interface CandidateRepositoryInterface
 * @package Adobe\Session6\Api
 */
interface CandidateRepositoryInterface
{
    /**
     * Get Candidate by Id
     *
     * @param int $id
     * @return CandidateInterface
     * @throws NoSuchEntityException If Candidate with the specified ID does not exist.
     * @throws LocalizedException
     */
    public function getById($id);
}