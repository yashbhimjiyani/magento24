<?php
 
namespace Adobe\Session2\Model;
 
class Product extends \Magento\Catalog\Model\Product
{
    public function getName()
    {
        return $this->_getData(self::NAME)." - modified using preference";
    }
}
