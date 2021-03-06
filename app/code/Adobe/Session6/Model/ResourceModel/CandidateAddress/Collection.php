<?php

namespace Adobe\Session6\Model\ResourceModel\CandidateAddress;

use Adobe\Session6\Model\CandidateAddress as Model;
use Adobe\Session6\Model\ResourceModel\CandidateAddress as ResourceModel;

/**
 * Class Collection
 */
class Collection extends \Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection
{
    /**
     * Init
     */
    protected function _construct() // phpcs:ignore PSR2.Methods.MethodDeclaration
    {
        $this->_init(Model::class, ResourceModel::class);
    }
}
