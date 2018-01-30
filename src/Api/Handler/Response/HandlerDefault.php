<?php

namespace SkyHub\Api\Handler\Response;

use Psr\Http\Message\ResponseInterface;

class HandlerDefault extends HandlerAbstract
{
    
    /** @var ResponseInterface */
    protected $httpResponse = null;
    
    
    /**
     * DefaultHandler constructor.
     *
     * @param ResponseInterface $response
     */
    public function __construct(ResponseInterface $response)
    {
        $this->httpResponse = $response;
    }


    /**
     * @return ResponseInterface
     */
    public function getHttpResponse()
    {
        return $this->httpResponse;
    }

}
