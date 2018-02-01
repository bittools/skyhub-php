<?php

namespace SkyHub\Api\Log\TypeInterface;

class Request extends TypeAbstract implements TypeRequestInterface
{
    
    /**
     * Request constructor.
     *
     * @param int          $requestId
     * @param string       $method
     * @param string       $uri
     * @param string|array $body
     * @param array        $headers
     * @param array        $requestOptions
     * @param string       $protocolVersion
     */
    public function __construct(
        $requestId,
        $method = null,
        $uri = null,
        $body = null,
        array $headers = [],
        array $requestOptions = [],
        $protocolVersion = null
    ) {
        parent::__construct($requestId, $body, $headers, $protocolVersion);
        
        $this->setMethod($method)
            ->setUri($uri)
            ->setOptions($requestOptions);
    }
    
    
    /**
     * @param string $method
     *
     * @return $this
     */
    public function setMethod($method = null)
    {
        $this->data['method'] = (string) $method;
        return $this;
    }
    
    
    /**
     * @param string $uri
     *
     * @return $this
     */
    public function setUri($uri = null)
    {
        $this->data['uri'] = (string) $uri;
        return $this;
    }
    
    
    /**
     * @param array $requestOptions
     *
     * @return $this
     */
    public function setOptions(array $requestOptions = [])
    {
        $this->data['options'] = (array) $requestOptions;
        return $this;
    }
}
