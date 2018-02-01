<?php

namespace SkyHub\Api\Handler\Response;

interface HandlerInterface
{
    
    /**
     * @return array
     */
    public function export();
    
    
    /**
     * @return bool
     */
    public function success();
    
    
    /**
     * @return bool
     */
    public function exception();
}
