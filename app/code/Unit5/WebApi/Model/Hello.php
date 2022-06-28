<?php
/**
 * Copyright © Magento. All rights reserved.
 * See COPYING.txt for license details.
 */
namespace Unit5\WebApi\Model;

/**
 * Class Hello
 * @package Unit5\WebApi\Model
 */
class Hello implements \Unit5\WebApi\Api\Data\HelloInterface
{
    /**
     * @return string
     */
    public function sayHello() {
        return "HELLO WORLD!";
    }
}