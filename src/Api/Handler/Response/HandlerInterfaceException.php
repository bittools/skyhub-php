<?php

namespace SkyHub\Api\Handler\Response;

use Exception;

interface HandlerInterfaceException extends HandlerInterface
{
    
    /**
     * HandlerInterfaceException constructor.
     *
     * @param Exception $exception
     */
    public function __construct(Exception $exception);
    
    
    /**
     * @return string
     */
    public function message();
    
    
    /**
     * @return string
     */
    public function file();
    
    
    /**
     * @return int|mixed
     */
    public function code();
    
    
    /**
     * @return int
     */
    public function line();
    
    
    /**
     * @return string
     */
    public function traceAsString();
    
    
    /**
     * @return array
     */
    public function trace();
}
