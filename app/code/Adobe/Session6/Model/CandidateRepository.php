<?php
namespace Adobe\Session6\Model;

use Magento\Framework\Api\SearchCriteriaInterface;
use Magento\Framework\Api\SearchResultsInterfaceFactory;
use Magento\Framework\Exception\CouldNotDeleteException;
use Magento\Framework\Exception\CouldNotSaveException;
use Magento\Framework\Exception\NoSuchEntityException;

use Adobe\Session6\Api\CandidateRepositoryInterface;
use Adobe\Session6\Api\Data\CandidateInterface;
use Adobe\Session6\Model\CandidateFactory;
use Adobe\Session6\Model\ResourceModel\Candidate as CandidateResourceModel;
use Adobe\Session6\Model\ResourceModel\Candidate\CollectionFactory;

/**
 * Class CandidateRepository
 */
class CandidateRepository implements CandidateRepositoryInterface
{
    protected $candidateFactory;
    protected $candidateResourceModel;
    protected $collectionFactory;
    protected $searchResultsFactory;

    /**
     * CandidateRepository constructor.
     *
     * @param CandidateFactory $candidateFactory
     * @param CandidateResourceModel $candidateResourceModel
     * @param CollectionFactory $collectionFactory
     * @param SearchResultsInterfaceFactory $searchResultsFactory
     */
    public function __construct(
        CandidateFactory $candidateFactory,
        CandidateResourceModel $candidateResourceModel,
        CollectionFactory $collectionFactory,
        SearchResultsInterfaceFactory $searchResultsFactory
    ) {
        $this->candidateFactory        = $candidateFactory;
        $this->candidateResourceModel  = $candidateResourceModel;
        $this->collectionFactory    = $collectionFactory;
        $this->searchResultsFactory = $searchResultsFactory;
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
        return $object->getData();
    }
}
