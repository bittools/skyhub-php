<?php

namespace SkyHub\Api\Handler\Response;

use Psr\Http\Message\ResponseInterface;

class HandlerDefault extends HandlerAbstract implements HandlerInterfaceSuccess
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
    public function httpResponse()
    {
        return $this->httpResponse;
    }
    
    
    /**
     * @return mixed|string
     */
    public function body()
    {
        return $this->httpResponse()->getBody()->getContents();
    }
    
    
    /**
     * @return int|null
     */
    public function bodySize()
    {
        return $this->httpResponse()->getBody()->getSize();
    }
    
    
    /**
     * @return mixed|\string[][]
     */
    public function headers()
    {
        return $this->httpResponse()->getHeaders();
    }
    
    
    /**
     * @return mixed|string
     */
    public function protocolVersion()
    {
        return $this->httpResponse()->getProtocolVersion();
    }
    
    
    /**
     * @return int|mixed
     */
    public function statusCode()
    {
        return $this->httpResponse()->getStatusCode();
    }
    
    
    /**
     * @return string
     */
    public function reasonPhrase()
    {
        return $this->httpResponse()->getReasonPhrase();
    }
    
    
    /**
     * @return bool
     */
    public function success()
    {
        return true;
    }
    
    
    /**
     * @return bool
     */
    public function exception()
    {
        return false;
    }
    
    
    /**
     * @return array
     */
    public function export()
    {
        return [
            'body'             => $this->body(),
            'body_size'        => $this->bodySize(),
            'headers'          => $this->headers(),
            'protocol_version' => $this->protocolVersion(),
            'status_code'      => $this->statusCode(),
            'reason_phrase'    => $this->reasonPhrase(),
        ];
    }
}
