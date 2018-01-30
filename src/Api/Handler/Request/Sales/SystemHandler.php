<?php

namespace SkyHub\Api\Handler\Request\Sales;

use SkyHub\Api\Handler\Request\HandlerAbstract;

class SystemHandler extends HandlerAbstract
{

    /** @var string */
    protected $baseUrlPath = '/sale_systems';


    /**
     * @return \SkyHub\Api\Handler\Response\HandlerInterface
     */
    public function statuses()
    {
        /** @var \SkyHub\Api\Handler\Response\HandlerInterface $responseHandler */
        $responseHandler = $this->service()->get($this->baseUrlPath());
        return $responseHandler;
    }

}
