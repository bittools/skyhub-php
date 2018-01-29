<?php

namespace SkyHub\Api;

use GuzzleHttp\Client as HttpClient;

abstract class ServiceAbstract implements ServiceInterface
{
    
    /** @var HttpClient */
    protected $_client = null;
    
    /** @var array */
    protected $_headers = [];
    
    /** @var int */
    protected $_timeout = 15;
    
    
    /**
     * Service constructor.
     *
     * @param string $baseUri
     * @param array  $headers
     * @param array  $options
     */
    public function __construct($baseUri, array $headers = [], array $options = [])
    {
        $this->_headers = $headers;
        
        $defaults = [
            'headers' => $headers,
        ];
    
        foreach ($options as $key => $value) {
            $defaults[$key] = $value;
        }
    
        $this->prepareHttpClient($baseUri, $defaults);
    
        return $this;
    }
    
    
    /**
     * @param       $method
     * @param       $uri
     * @param array $options
     *
     * @return \Psr\Http\Message\ResponseInterface
     */
    public function request($method, $uri, $options = [])
    {
        $options[\GuzzleHttp\RequestOptions::TIMEOUT] = $this->getTimeout();
        $options[\GuzzleHttp\RequestOptions::HEADERS] = $this->_headers;
        
        /** @var \Psr\Http\Message\ResponseInterface $response */
        $response = $this->httpClient()->request($method, $uri, $options);
        
        return $response;
    }
    
    
    /**
     * A private __clone method prevents this class to be cloned by any other class.
     *
     * @return void
     */
    private function __clone()
    {
    }
    
    
    /**
     * A private __wakeup method prevents this object to be unserialized.
     *
     * @return void
     */
    private function __wakeup()
    {
    }
    
    
    /**
     * @return HttpClient
     */
    protected function httpClient()
    {
        return $this->_client;
    }
    
    
    /**
     * @param null  $baseUri
     * @param array $defaults
     *
     * @return HttpClient
     */
    protected function prepareHttpClient($baseUri = null, array $defaults = [])
    {
        if (null === $this->_client) {
            $this->_client = new HttpClient([
                'base_uri' => $baseUri,
                'base_url' => $baseUri,
                'defaults' => $defaults
            ]);
        }
    
        return $this->_client;
    }
    
    
    /**
     * @return array
     */
    public function getHeaders()
    {
        return (array) $this->_headers;
    }
    
    
    /**
     * @param array $headers
     * @param bool  $append
     *
     * @return $this
     */
    public function setHeaders(array $headers = [], $append = true)
    {
        if (!$append) {
            $this->_headers = $headers;
            return $this;
        }
        
        foreach ($headers as $key => $value) {
            $this->_headers[$key] = $value;
        }
        
        return $this;
    }
    
    
    /**
     * @return int
     */
    public function getTimeout()
    {
        return (int) $this->_timeout;
    }
    
    
    /**
     * @param integer $timeout
     *
     * @return $this
     */
    public function setTimeout($timeout)
    {
        $this->_timeout = (int) $timeout;
        return $this;
    }
    
}
