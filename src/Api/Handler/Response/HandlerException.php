<?php

namespace SkyHub\Api\Handler\Response;

use Exception;

class HandlerException extends HandlerAbstract implements HandlerInterfaceException
{
    
    /** @var Exception */
    protected $exception = null;
    
    
    /**
     * HandlerException constructor.
     *
     * @param Exception $exception
     */
    public function __construct(Exception $exception)
    {
        $this->exception = $exception;
    }
    
    
    /**
     * @return string
     */
    public function message()
    {
        return $this->exception->getMessage();
    }
    
    
    /**
     * @return string
     */
    public function file()
    {
        return $this->exception->getFile();
    }
    
    
    /**
     * @return int|mixed
     */
    public function code()
    {
        return $this->exception->getCode();
    }
    
    
    /**
     * @return int
     */
    public function line()
    {
        return $this->exception->getLine();
    }
    
    
    /**
     * @return string
     */
    public function traceAsString()
    {
        return $this->exception->getTraceAsString();
    }
    
    
    /**
     * @return array
     */
    public function trace()
    {
        return $this->exception->getTrace();
    }
    
    
    /**
     * @return bool
     */
    public function success()
    {
        return false;
    }
    
    
    /**
     * @return bool
     */
    public function exception()
    {
        return true;
    }
    
    
    /**
     * @return array
     */
    public function export()
    {
        return [
            'message' => $this->message(),
            'file'    => $this->file(),
            'code'    => $this->code(),
            'line'    => $this->line(),
            'trace'   => $this->traceAsString(),
        ];
    }
}
