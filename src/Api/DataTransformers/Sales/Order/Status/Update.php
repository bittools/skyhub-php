<?php

namespace SkyHub\Api\DataTransformers\Sales\Order\Status;

class Update extends Create
{

    /**
     * Create constructor.
     *
     * @param string $code
     * @param string $label
     * @param string $type
     */
    public function __construct($code, $label, $type)
    {
        parent::__construct($code, $label, $type);
    }

}
