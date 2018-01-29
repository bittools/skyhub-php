<?php

namespace SkyHub\Api\Log;

trait Getter
{
    
    protected $logger;
    
    
    /**
     * @return \SkyHub\Api\Log\Logger
     */
    protected function logger()
    {
        if (empty($this->logger)) {
            $this->logger = new Logger('service_request.log');
        }
        
        return $this->logger;
    }
    
}
