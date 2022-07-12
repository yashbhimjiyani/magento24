<?php
namespace Adobe\Session6\Model\ResourceModel;

/**
 * Class CandidateAddress
 */
class CandidateAddress extends \Magento\Framework\Model\ResourceModel\Db\AbstractDb
{
    /**
     * Init
     */
    protected function _construct() // phpcs:ignore PSR2.Methods.MethodDeclaration
    {
        $this->_init('candidates_addresses', 'address_id');
    }
}