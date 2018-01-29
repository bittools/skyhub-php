<?php

namespace SkyHub\Api\Handler\Response;

use Psr\Http\Message\ResponseInterface;

interface HandlerInterface
{
    
    public function __construct(ResponseInterface $response);
    
}
