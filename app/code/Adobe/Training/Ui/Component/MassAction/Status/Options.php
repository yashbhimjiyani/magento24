<?php
/**
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 *
 * Created By : Yash B
 */
namespace Adobe\Training\Ui\Component\MassAction\Status;

use Magento\Framework\UrlInterface;
use Laminas\Stdlib\JsonSerializable;

class Options extends \Magento\Ui\Component\Listing\Columns\Column
{

    /**
     * @var array
     */
    protected $options;

    /**
     * Additional options params
     *
     * @var array
     */
    protected $data;

    /**
     * @var UrlInterface
     */
    protected $urlBuilder;

    /**
     * Base URL for subactions
     *
     * @var string
     */
    protected $urlPath;

    /**
     * Param name for subactions
     *
     * @var string
     */
    protected $paramName;

    /**
     * Additional params for subactions
     *
     * @var array
     */
    protected $additionalData = [];

    /**
     * @param UrlInterface $urlBuilder
     * @param array        $data
     */
    public function __construct(
        UrlInterface $urlBuilder,
        array $data = []
    ) {
        $this->data = $data;
        $this->urlBuilder = $urlBuilder;
    }

    /**
     * Get action options
     *
     * @return array
     */
    public function jsonSerialize()
    {
        if ($this->options === null) {
            $options = [
                [
                    "value" => "1",
                    "label" => ('Active'),
                ],
                [
                    "value" => "0",
                    "label" => ('Inactive'),
                ],
            ];

            $this->prepareData();

            foreach ($options as $optionCode) {
                $this->options[$optionCode['value']] = [
                    'type' => 'status_' . $optionCode['value'],
                    'label' => $optionCode['label'],
                ];
                if ($this->urlPath && $this->paramName) {
                    $this->options[$optionCode['value']]['url'] = $this->urlBuilder->getUrl(
                        $this->urlPath,
                        [
                            $this->paramName => $optionCode['value'],
                        ]
                    );
                }
                $this->options[$optionCode['value']] = array_merge_recursive(
                    $this->options[$optionCode['value']],
                    $this->additionalData
                );
            }
            $this->options = array_values($this->options);
        }
        return $this->options;
    }
}