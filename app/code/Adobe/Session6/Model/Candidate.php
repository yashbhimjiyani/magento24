<?php

namespace Adobe\Session6\Model;

use Magento\Framework\DataObject\IdentityInterface;
use Magento\Framework\Model\AbstractExtensibleModel;
use Adobe\Session6\Api\Data\CandidateInterface;
use Adobe\Session6\Model\ResourceModel\Candidate as ResourceModel;

/**
 * Class Candidate
 */
class Candidate extends AbstractExtensibleModel implements
    CandidateInterface,
    IdentityInterface
{
    const CACHE_TAG = 'candidates_data';

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
        return [self::CACHE_TAG . '_' . $this->getId()];
    }

    public function getId()
    {
        return $this->getData('id');
    }
    public function setId($id)
    {
        return $this->setData('id', $id);
    }
    public function getName()
    {
        return $this->getData('name');
    }
    public function setName($name)
    {
        return $this->setData('name', $name);
    }
    public function getAddress()
    {
        return $this->getData('address');
    }
    public function setAddress($address)
    {
        return $this->setData('address', $address);
    }
    public function getDob()
    {
        return $this->getData('dob');
    }
    public function setDob($dob)
    {
        return $this->setData('dob', $dob);
    }
    public function getIsActive()
    {
        return $this->getData('is_active');
    }
    public function setIsActive($isActive)
    {
        return $this->setData('is_active', $isActive);
    }
    public function getIsIndianCitizen()
    {
        return $this->getData('is_indian_citizen');
    }
    public function setIsIndianCitizen($isIndianCitizen)
    {
        return $this->setData('is_indian_citizen', $isIndianCitizen);
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

    public function setExtensionAttributes(\Adobe\Session6\Api\Data\CandidateExtensionInterface $extensionAttributes)
    {
        $this->_setExtensionAttributes($extensionAttributes);
    }
}
