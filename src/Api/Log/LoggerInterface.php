<?php

namespace SkyHub\Api\Log;

use SkyHub\Api\Handler\Request\HandlerInterface as RequestHandlerInterface;
use SkyHub\Api\Handler\Response\HandlerInterface as ResponseHandlerInterface;

interface LoggerInterface
{
    
    /**
     * @param RequestHandlerInterface $request
     */
    public function logRequest(RequestHandlerInterface $request);
    
    
    /**
     * @param ResponseHandlerInterface $response
     */
    public function logResponse(ResponseHandlerInterface $response);
    
}
