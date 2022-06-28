<?php
/**
 *
 * Copyright © Magento. All rights reserved.
 * See COPYING.txt for license details.
 */
namespace Unit5\DataApi\Model;

use Unit5\DataApi\Api\DataRepositoryInterface;
use Unit5\DataApi\Api\Data\DataSearchResultsInterfaceFactory;
use Unit5\DataApi\Model\DataApi;
use Unit5\DataApi\Model\DataApiFactory;
use Unit5\DataApi\Model\ResourceModel\DataApi\Collection;
use Magento\Framework\Api\Search\FilterGroup;
use Magento\Framework\Api\SearchCriteria\CollectionProcessorInterface;
use Magento\Framework\Api\SearchCriteriaInterface;

/**
 * Class Repository
 * @package Unit5\DataApi\Model
 */
class Repository implements DataRepositoryInterface
{
    /**
     * @var DataApiFactory
     */
    private $dataModelFactory;

    /**
     * @var DataSearchResultsInterfaceFactory
     */
    private $searchResults;

    /**
     * @var CollectionProcessorInterface
     */
    private $collectionProcessor;

    /**
     * @param DataApi $dataModelFactory
     * @param DataSearchResultsInterfaceFactory $searchResults
     * @param CollectionProcessorInterface $collectionProcessor
     */
    public function __construct(
        DataApiFactory $dataModelFactory,
        DataSearchResultsInterfaceFactory $searchResults,
        CollectionProcessorInterface $collectionProcessor
    )
    {
        $this->dataModelFactory = $dataModelFactory;
        $this->searchResults = $searchResults;
        $this->collectionProcessor = $collectionProcessor;
    }

    /**
     * @param SearchCriteriaInterface $searchCriteria
     * @return DataRepositoryInterface
     */
    public function getList(SearchCriteriaInterface $searchCriteria)
    {
        $dataModel = $this->dataModelFactory->create();
        $dataCollection = $dataModel->getCollection();

        $this->collectionProcessor->process($searchCriteria, $dataCollection);
        $dataModels = $this->getDataModelsArray($dataCollection);

        /** @var DataSearchResultsInterface $searchResults */
        $searchResults = $this->searchResults->create();
        $searchResults->setSearchCriteria($searchCriteria);
        $searchResults->setItems($dataModels);
        $searchResults->setTotalCount(count($dataModels));

        return $searchResults;
    }

     /**
     * @param Collection $collection
     * @return array
     */
    private function getDataModelsArray(Collection $collection)
    {
        $entities = array_map(
            function (DataApi $model) {
                return $model->getData();
            },
            $collection->getItems()
        );
        return $entities;
    }
}