<?php

namespace SkyHub\Api\Log;

use SkyHub\Api\Log\TypeInterface\TypeRequestInterface;
use SkyHub\Api\Log\TypeInterface\TypeResponseInterface;

interface LoggerInterface
{
    
    /**
     * @param TypeRequestInterface $request
     *
     * @return mixed
     */
    public function logRequest(TypeRequestInterface $request);
    
    
    /**
     * @param TypeResponseInterface $response
     *
     * @return mixed
     */
    public function logResponse(TypeResponseInterface $response);
}
