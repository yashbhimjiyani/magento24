<?php

namespace Adobe\Session6\Model;

use Magento\Framework\DataObject\IdentityInterface;
use Magento\Framework\Model\AbstractExtensibleModel;
use Adobe\Session6\Api\Data\CandidateAddressInterface;
use Adobe\Session6\Model\ResourceModel\CandidateAddress as ResourceModel;

/**
 * Class CandidateAddress
 */
class CandidateAddress extends AbstractExtensibleModel implements
    CandidateAddressInterface,
    IdentityInterface
{
    const CACHE_TAG = 'candidates_addresses';

    /**
     * Init
     */
    protected function _construct() // phpcs:ignore PSR2.Methods.MethodDeclaration
    {
        $this->_init(ResourceModel::class);
    }

    /**
     * @inheritDoc
     */
    public function getIdentities()
    {
        return [self::CACHE_TAG . '_' . $this->getAddressId()];
    }

    public function getAddressId()
    {
        return $this->getData('address_id');
    }
    public function setAddressId($address_id)
    {
        return $this->setData('address_id', $address_id);
    }
    public function getStreet1()
    {
        return $this->getData('street1');
    }
    public function setStreet1($street1)
    {
        return $this->setData('street1', $street1);
    }
    public function getStreet2()
    {
        return $this->getData('street2');
    }
    public function setStreet2($street2)
    {
        return $this->setData('street2', $street2);
    }
    public function getCity()
    {
        return $this->getData('city');
    }
    public function setCity($city)
    {
        return $this->setData('city', $city);
    }
    public function getState()
    {
        return $this->getData('state');
    }
    public function setState($state)
    {
        return $this->setData('state', $state);
    }
    public function getCountry()
    {
        return $this->getData('country');
    }
    public function setCountry($country)
    {
        return $this->setData('country', $country);
    }
    public function getCandidateId()
    {
        return $this->getData('candidate_id');
    }
    public function setCandidateId($candidateId)
    {
        return $this->setData('candidate_id', $candidateId);
    }
    public function getCreatedAt()
    {
        return $this->getData('created_at');
    }
    public function setCreatedAt($createdAt)
    {
        return $this->setData('created_at', $createdAt);
    }
    public function getUpdatedAt()
    {
        return $this->getData('updated_at');
    }
    public function setUpdatedAt($updateAt)
    {
        return $this->setData('updated_at', $updateAt);
    }
    public function getExtensionAttributes()
    {
        return $this->_getExtensionAttributes();
    }

    public function setExtensionAttributes(\Adobe\Session6\Api\Data\CandidateAddressExtensionInterface $extensionAttributes)
    {
        $this->_setExtensionAttributes($extensionAttributes);
    }
}
