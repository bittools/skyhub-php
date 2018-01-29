<?php

namespace SkyHub\Api\Handlers\Response;

use Psr\Http\Message\ResponseInterface;

interface HandlerInterface
{
    
    public function __construct(ResponseInterface $response);
    
}
