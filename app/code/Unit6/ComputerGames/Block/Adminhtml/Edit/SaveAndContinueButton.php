<?php
/**
 * *
 *   * Copyright © Magento. All rights reserved.
 *   * See COPYING.txt for license details.
 *
 */
namespace  Unit6\ComputerGames\Block\Adminhtml\Edit;

use Magento\Framework\View\Element\UiComponent\Control\ButtonProviderInterface;

/**
 * Class SaveAndContinueButton
 */
class SaveAndContinueButton extends GenericButton implements ButtonProviderInterface
{
    /**
     * @return array
     */
    public function getButtonData()
    {
        $data = [
                'label' => __('Save and Continue Edit'),
                'class' => 'save',
                'data_attribute' => [
                    'mage-init' => ['button' => ['event' => 'saveAndContinueEdit'],],
                ],
                'sort_order' => 80,
        ];
        return $data;
    }
}
