<?php

namespace Adobe\Session6\Model;

use Magento\Framework\Api\SearchCriteriaInterface;
use Magento\Framework\Api\SearchResultsInterfaceFactory;
use Magento\Framework\Exception\NoSuchEntityException;
use Magento\Framework\Api\Search\FilterGroup;
use Adobe\Session6\Api\CandidateAddressRepositoryInterface;
use Adobe\Session6\Api\Data\CandidateAddressInterface;
use Adobe\Session6\Api\Data\CandidateAddressInterfaceFactory as CandidateAddressDataFactory;
use Adobe\Session6\Model\CandidateAddressFactory;
use Adobe\Session6\Model\CandidateAddress as CandidateAddressModel;
use Adobe\Session6\Model\ResourceModel\CandidateAddress as CandidateAddressResourceModel;
use Adobe\Session6\Model\ResourceModel\CandidateAddress\CollectionFactory;
use Adobe\Session6\Model\ResourceModel\CandidateAddress\Collection as CandidateAddressCollection;
use Magento\Framework\Api\SortOrder;

/**
 * Class CandidateAddressRepository
 */
class CandidateAddressRepository implements CandidateAddressRepositoryInterface
{
    protected $candidateAddressFactory;
    protected $candidateAddressResourceModel;
    protected $collectionFactory;
    protected $searchResultsFactory;
    protected $candidateAddressDataFactory;

    /**
     * CandidateAddressRepository constructor.
     *
     * @param CandidateAddressFactory $candidateAddressFactory
     * @param CandidateAddressResourceModel $candidateAddressResourceModel
     * @param CollectionFactory $collectionFactory
     * @param SearchResultsInterfaceFactory $searchResultsFactory
     * @param CandidateAddressDataFactory $candidateAddressDataFactory
     */
    public function __construct(
        CandidateAddressFactory $candidateAddressFactory,
        CandidateAddressResourceModel $candidateAddressResourceModel,
        CollectionFactory $collectionFactory,
        SearchResultsInterfaceFactory $searchResultsFactory,
        CandidateAddressDataFactory $candidateAddressDataFactory
    ) {
        $this->candidateAddressFactory        = $candidateAddressFactory;
        $this->candidateAddressResourceModel  = $candidateAddressResourceModel;
        $this->collectionFactory    = $collectionFactory;
        $this->searchResultsFactory = $searchResultsFactory;
        $this->candidateAddressDataFactory = $candidateAddressDataFactory;
    }

    /**
     * @inheritDoc
     */
    public function getByAddressId($addressId)
    {
        $object = $this->candidateAddressFactory->create();
        $this->candidateAddressResourceModel->load($object, $addressId);
        if (!$object->getAddressId()) {
            throw new NoSuchEntityException(__('Object with Address id "%1" does not exist.', $addressId));
        }
        return $object;
    }

    /**
     * @inheritDoc
     */
    public function getByCandidateId($candidateId)
    {
        $object=$this->candidateAddressFactory->create();
        $collection=$object->getCollection();
        $collection->addFieldToFilter('candidate_id',$candidateId);
        return $collection->getData();
    }
}
