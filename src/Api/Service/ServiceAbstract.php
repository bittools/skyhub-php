<?php

namespace SkyHub\Api\Service;

use GuzzleHttp\Client as HttpClient;
use SkyHub\Api\Handler\Response\HandlerDefault;
use SkyHub\Api\Handler\Response\HandlerInterface;
use SkyHub\Api\Log\Getter;

abstract class ServiceAbstract implements ServiceInterface
{
    
    use Getter;
    
    
    CONST REQUEST_METHOD_GET    = 'GET';
    CONST REQUEST_METHOD_POST   = 'POST';
    CONST REQUEST_METHOD_PUT    = 'PUT';
    CONST REQUEST_METHOD_HEAD   = 'HEAD';
    CONST REQUEST_METHOD_DELETE = 'DELETE';

    
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
     * @param string $method
     * @param string $uri
     * @param null   $body
     * @param array  $options
     *
     * @return HandlerInterface
     */
    public function request($method, $uri, $body = null, $options = [])
    {
        $options[\GuzzleHttp\RequestOptions::TIMEOUT] = $this->getTimeout();
        $options[\GuzzleHttp\RequestOptions::HEADERS] = $this->_headers;
        
        $options = $this->prepareRequestBody($body, $options);

        /** @todo Log the request before send it to service. */
        // $this->logger()->info();

        /** @var \Psr\Http\Message\ResponseInterface $response */
        $response = $this->httpClient()->request($method, $uri, $options);
        
        /** @var HandlerInterface $responseHandler */
        $responseHandler = new HandlerDefault($response);
    
        /** @todo Log the response after send it to service. */
        // $this->logger()->info();
        
        return $responseHandler;
    }
    
    
    /**
     * @param string|array $bodyData
     * @param array        $options
     *
     * @return array
     */
    protected function prepareRequestBody($bodyData, array &$options = [])
    {
        $options[\GuzzleHttp\RequestOptions::BODY] = $bodyData;
        return $options;
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
