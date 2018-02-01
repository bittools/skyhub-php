<?php

namespace SkyHub\Api\Handler\Response;

use Psr\Http\Message\ResponseInterface;

interface HandlerInterfaceSuccess extends HandlerInterface
{

    /**
     * HandlerInterface constructor.
     *
     * @param ResponseInterface $response
     */
    public function __construct(ResponseInterface $response);
    
    
    /**
     * @return ResponseInterface
     */
    public function httpResponse();


    /**
     * @return mixed
     */
    public function body();
    
    
    /**
     * @return int|null
     */
    public function bodySize();


    /**
     * @return mixed
     */
    public function headers();


    /**
     * @return mixed
     */
    public function statusCode();


    /**
     * @return mixed
     */
    public function protocolVersion();
    
    
    /**
     * @return string
     */
    public function reasonPhrase();
    
}
