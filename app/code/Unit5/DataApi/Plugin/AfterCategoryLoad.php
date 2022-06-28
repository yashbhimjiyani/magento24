<?php
/**
 *
 * Copyright © Magento. All rights reserved.
 * See COPYING.txt for license details.
 */
namespace Unit5\DataApi\Plugin;

use Unit5\DataApi\Model\Repository;
use Magento\Framework\Api\SearchCriteriaBuilder;

/**
 * Class AfterCategoryLoad
 * @package Unit5\DataApi\Plugin
 */
class AfterCategoryLoad
{
    /**
     * @var \Magento\Catalog\Api\Data\CategoryExtensionFactory
     */
    protected $categoryExtensionFactory;

    protected $repository;

    /**
     * @var SearchCriteriaBuilder
     */
    private $searchCriteriaBuilder;

    /**
     * @param \Magento\Catalog\Api\Data\CategoryExtensionFactory $categoryExtensionFactory
     */
    public function __construct(
        Repository $repository,
        SearchCriteriaBuilder $searchCriteriaBuilder,
        \Magento\Catalog\Api\Data\CategoryExtensionFactory $categoryExtensionFactory
    ) {
        $this->repository = $repository;
        $this->searchCriteriaBuilder = $searchCriteriaBuilder;
        $this->categoryExtensionFactory = $categoryExtensionFactory;
    }

    /**
     * Add countries information to the categorie's extension attributes
     *
     * @param \Magento\Catalog\Model\Category $category
     * @return \Magento\Catalog\Model\Category
     */
    public function afterLoad(\Magento\Catalog\Model\Category $category)
    {
        $categoryExtension = $category->getExtensionAttributes();
        if ($categoryExtension === null) {
            $categoryExtension = $this->categoryExtensionFactory->create();
        }
        $data = $this->repository->getList($this->searchCriteriaBuilder->create())->getItems();
        $countries = array();
        if (is_array($data)) {
            foreach ($data as $country) {
                $countries[] = $country['country'];
            }
        }
        $categoryExtension->setCountries($countries);
        $category->setExtensionAttributes($categoryExtension);
        return $category;
    }
}
