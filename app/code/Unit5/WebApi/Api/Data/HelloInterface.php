<?php
/**
 * Copyright © Magento. All rights reserved.
 * See COPYING.txt for license details.
 */
namespace Unit5\WebApi\Api\Data;

/**
 * Interface HelloInterface
 * @package Unit5\WebApi\Api\Data
 */
interface HelloInterface {
    /**
     * Hello method
     *
     * @return string|null
     */
    public function sayHello();
}