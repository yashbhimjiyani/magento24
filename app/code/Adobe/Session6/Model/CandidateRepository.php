<?php

namespace Adobe\Session6\Model;

use Magento\Framework\Api\SearchCriteriaInterface;
use Magento\Framework\Api\SearchResultsInterfaceFactory;
use Magento\Framework\Exception\CouldNotDeleteException;
use Magento\Framework\Exception\CouldNotSaveException;
use Magento\Framework\Exception\NoSuchEntityException;
use Magento\Framework\Api\Search\FilterGroup;
use Adobe\Session6\Api\CandidateRepositoryInterface;
use Adobe\Session6\Api\Data\CandidateInterface;
use Adobe\Session6\Api\Data\CandidateInterfaceFactory as CandidateDataFactory;
use Adobe\Session6\Model\CandidateFactory;
use Adobe\Session6\Model\Candidate as CandidateModel;
use Adobe\Session6\Model\ResourceModel\Candidate as CandidateResourceModel;
use Adobe\Session6\Model\ResourceModel\Candidate\CollectionFactory;
use Adobe\Session6\Model\ResourceModel\Candidate\Collection as CandidateCollection;
use Magento\Framework\Api\SortOrder;

/**
 * Class CandidateRepository
 */
class CandidateRepository implements CandidateRepositoryInterface
{
    protected $candidateFactory;
    protected $candidateResourceModel;
    protected $collectionFactory;
    protected $searchResultsFactory;
    protected $candidateDataFactory;

    /**
     * CandidateRepository constructor.
     *
     * @param CandidateFactory $candidateFactory
     * @param CandidateResourceModel $candidateResourceModel
     * @param CollectionFactory $collectionFactory
     * @param SearchResultsInterfaceFactory $searchResultsFactory
     * @param CandidateDataFactory $candidateDataFactory
     */
    public function __construct(
        CandidateFactory $candidateFactory,
        CandidateResourceModel $candidateResourceModel,
        CollectionFactory $collectionFactory,
        SearchResultsInterfaceFactory $searchResultsFactory,
        CandidateDataFactory $candidateDataFactory
    ) {
        $this->candidateFactory        = $candidateFactory;
        $this->candidateResourceModel  = $candidateResourceModel;
        $this->collectionFactory    = $collectionFactory;
        $this->searchResultsFactory = $searchResultsFactory;
        $this->candidateDataFactory = $candidateDataFactory;
    }

    /**
     * @inheritDoc
     */
    public function getById($id)
    {
        $object = $this->candidateFactory->create();
        $this->candidateResourceModel->load($object, $id);
        if (!$object->getId()) {
            throw new NoSuchEntityException(__('Object with id "%1" does not exist.', $id));
        }
        return $object;
    }

    /**
     * @inheritDoc
     */
    public function getList(SearchCriteriaInterface $criteria)
    {
        $searchResults = $this->searchResultsFactory->create();
        $searchResults->setSearchCriteria($criteria);
        $collection = $this->collectionFactory->create();
        foreach ($criteria->getFilterGroups() as $filterGroup) {
            $fields = [];
            $conditions = [];
            foreach ($filterGroup->getFilters() as $filter) {
                $condition = $filter->getConditionType() ? $filter->getConditionType() : 'eq';
                $fields[] = $filter->getField();
                $conditions[] = [$condition => $filter->getValue()];
            }
            if ($fields) {
                $collection->addFieldToFilter($fields, $conditions);
            }
        }
        $searchResults->setTotalCount($collection->getSize());
        $sortOrders = $criteria->getSortOrders();
        if ($sortOrders) {
            /** @var SortOrder $sortOrder */
            foreach ($sortOrders as $sortOrder) {
                $collection->addOrder(
                    $sortOrder->getField(),
                    ($sortOrder->getDirection() == SortOrder::SORT_ASC) ? 'ASC' : 'DESC'
                );
            }
        }
        $collection->setCurPage($criteria->getCurrentPage());
        $collection->setPageSize($criteria->getPageSize());
        $objects = [];
        foreach ($collection as $objectModel) {
            $objects[] = $objectModel;
        }
        $searchResults->setItems($objects);
        return $searchResults;
    }

    /**
     * @inheritDoc
     */
    public function getByIds($ids)
    {
        $objects = array();
        foreach ($ids as $id) {
            $object = $this->candidateFactory->create();
            $this->candidateResourceModel->load($object, $id);
            if (!$object->getId()) {
                throw new NoSuchEntityException(__('Object with id "%1" does not exist.', $id));
            }
            array_push($objects, $object);
        }
        return $objects;
    }
}
