<?php

/**
 *
 * Copyright © Magento. All rights reserved.
 * See COPYING.txt for license details.
 */

namespace Adobe\Session6\Api\Data;

use Magento\Framework\Api\ExtensibleDataInterface;

/**
 * Interface CandidateInterface
 * @package Adobe\Session6\Api\Data
 */
interface CandidateInterface extends ExtensibleDataInterface
{
    /**
     * @param int $id
     * @return $this
     */
    public function setId($id);
    /**
     * @return int
     */
    public function getId();
    /**
     * @return string
     */
    public function getName();
    /**
     * @param string $name
     * @return $this
     */
    public function setName($name);
    /**
     * @return string
     */
    public function getCreatedAt();
    /**
     * @param string $createdAt
     * @return $this
     */
    public function setCreatedAt($createdAt);
    /**
     * @return string
     */
    public function getUpdatedAt();
    /**
     * @param string $updatedAt
     * @return $this
     */
    public function setUpdatedAt($updatedAt);
    /**
     * @return string
     */
    public function getDob();
    /**
     * @param string $dob
     * @return $this
     */
    public function setDob($dob);
    /**
     * @return string
     */
    public function getIsActive();
    /**
     * @param string $isActive
     * @return $this
     */
    public function setIsActive($isActive);
    /**
     * @return string
     */
    public function getIsIndianCitizen();
    /**
     * @param string $isIndianCitizen
     * @return $this
     */
    public function setIsIndianCitizen($isIndianCitizen);
    /**
     * @return \Adobe\Session6\Api\Data\CandidateExtensionInterface|null
     */
    public function getExtensionAttributes();

    /**
     * @param \Adobe\Session6\Api\Data\CandidateExtensionInterface $extensionAttributes
     * @return void
     */
    public function setExtensionAttributes(CandidateExtensionInterface $extensionAttributes);
}
