<?php

/**
 *
 * Copyright © Magento. All rights reserved.
 * See COPYING.txt for license details.
 */

namespace Adobe\Session6\Api\Data;

use Magento\Framework\Api\ExtensibleDataInterface;

/**
 * Interface CandidateAddressInterface
 * @package Adobe\Session6\Api\Data
 */
interface CandidateAddressInterface extends ExtensibleDataInterface
{
    /**
     * @param int $addressId
     * @return $this
     */
    public function setAddressId($addressId);
    /**
     * @return int
     */
    public function getAddressId();
    /**
     * @return string
     */
    public function getStreet1();
    /**
     * @param string $street1
     * @return $this
     */
    public function setStreet1($street1);
    /**
     * @return string
     */
    public function getStreet2();
    /**
     * @param string $street2
     * @return $this
     */
    public function setStreet2($street2);
    /**
     * @return string
     */
    public function getCity();
    /**
     * @param string $city
     * @return $this
     */
    public function setCity($city);
    /**
     * @return string
     */
    public function getState();
    /**
     * @param string $state
     * @return $this
     */
    public function setState($state);
    /**
     * @return string
     */
    public function getCountry();
    /**
     * @param string $country
     * @return $this
     */
    public function setCountry($country);
    /**
     * @return int
     */
    public function getCandidateId();
    /**
     * @param int $candidateId
     * @return $this
     */
    public function setCandidateId($candidateId);
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
     * @return \Adobe\Session6\Api\Data\CandidateAddressExtensionInterface|null
     */
    public function getExtensionAttributes();

    /**
     * @param \Adobe\Session6\Api\Data\CandidateAddressExtensionInterface $extensionAttributes
     * @return void
     */
    public function setExtensionAttributes(CandidateAddressExtensionInterface $extensionAttributes);
}
