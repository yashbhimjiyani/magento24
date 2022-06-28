<?php
/**
 *
 * Copyright © Magento. All rights reserved.
 * See COPYING.txt for license details.
 */
namespace Unit5\DataApi\Setup\Patch\Data;

use Magento\Framework\Setup\Patch\DataPatchInterface;
use Magento\Eav\Setup\EavSetupFactory;
use Magento\Framework\Setup\ModuleDataSetupInterface;

class AddTableData implements DataPatchInterface
{
    private $moduleDataSetup;

    public function __construct(
        ModuleDataSetupInterface $moduleDataSetup
    ) {
        $this->moduleDataSetup = $moduleDataSetup;
    }

    public function apply()
    {
        $setup = $this->moduleDataSetup;

        $data = array(
            array('category_id' => 11, 'country' => 'France'),
            array('category_id' => 11, 'country' => 'US')
        );
        foreach ($data as $bind) {
          $setup->getConnection()->insertForce($setup->getTable('unit5_category_country'), $bind);
        }
    }

    /**
     * getAliases
     *
     * @return void
     */
    public function getAliases()
    {
        return [];
    }

    /**
     * getDependencies
     *
     * @return void
     */
    public static function getDependencies()
    {
        return [];
    }
}