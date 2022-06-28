<?php
 
namespace Adobe\CoreConcepts\Model;
 
class Product extends \Magento\Catalog\Model\Product
{
    public function getName()
    {
        return $this->_getData(self::NAME)." - modified using preference";
    }
}
