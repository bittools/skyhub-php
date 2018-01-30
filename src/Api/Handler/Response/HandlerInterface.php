<?php

namespace SkyHub\Api\Handler\Response;

use Psr\Http\Message\ResponseInterface;

interface HandlerInterface
{

    /**
     * HandlerInterface constructor.
     *
     * @param ResponseInterface $response
     */
    public function __construct(ResponseInterface $response);


    /**
     * @return mixed
     */
    public function body();
    
}
