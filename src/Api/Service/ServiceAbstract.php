<?php

namespace SkyHub\Api\Service;

use GuzzleHttp\Client as HttpClient;
use SkyHub\Api;
use SkyHub\Api\Handler\Response\HandlerDefault;
use SkyHub\Api\Log\Loggerable;
use SkyHub\Api\Log\TypeInterface\Request;
use SkyHub\Api\Log\TypeInterface\Response;
use SkyHub\Api\Handler\Response\HandlerException;

abstract class ServiceAbstract implements ServiceInterface
{
    
    use Loggerable;
    
    
    CONST REQUEST_METHOD_GET    = 'GET';
    CONST REQUEST_METHOD_POST   = 'POST';
    CONST REQUEST_METHOD_PUT    = 'PUT';
    CONST REQUEST_METHOD_HEAD   = 'HEAD';
    CONST REQUEST_METHOD_DELETE = 'DELETE';
    CONST REQUEST_METHOD_PATCH  = 'PATCH';

    
    /** @var HttpClient */
    protected $_client = null;
    
    /** @var array */
    protected $_headers = [];
    
    /** @var int */
    protected $_timeout = 15;
    
    /** @var int */
    protected $_requestId = null;
    
    
    /**
     * Service constructor.
     *
     * @param string $baseUri
     * @param array  $headers
     * @param array  $options
     */
    public function __construct($baseUri, array $headers = [], array $options = [], $log = true)
    {
        $this->_headers = array_merge($this->_headers, $headers);
        
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
     * @param bool $renew
     *
     * @return int
     */
    public function getRequestId($renew = false)
    {
        if (empty($this->_requestId) || $renew) {
            $this->_requestId = rand(1000000000, 9999999999);
        }
        
        return $this->_requestId;
    }
    
    
    /**
     * @param string $method
     * @param string $uri
     * @param null   $body
     * @param array  $options
     *
     * @return Api\Handler\Response\HandlerInterfaceException|Api\Handler\Response\HandlerInterfaceSuccess
     */
    public function request($method, $uri, $body = null, $options = [], $debug = false)
    {
        $options[\GuzzleHttp\RequestOptions::TIMEOUT] = $this->getTimeout();
        $options[\GuzzleHttp\RequestOptions::HEADERS] = $this->_headers;
        $options[\GuzzleHttp\RequestOptions::DEBUG]   = (bool) $debug;
        
        $options = $this->prepareRequestBody($body, $options);
        
        /** Log the request before sending it. */
        $logRequest = new Request($this->getRequestId(), $method, $uri, $body, $this->protectedHeaders(), $options);
        $this->logger()->logRequest($logRequest);

        try {
            /** @var \Psr\Http\Message\ResponseInterface $response */
            $response = $this->httpClient()->request($method, $uri, $options);
    
            /** @var Api\Handler\Response\HandlerInterfaceSuccess $responseHandler */
            $responseHandler = new HandlerDefault($response);
    
            /** Log the request response. */
            $logResponse = (new Response($this->getRequestId()))->importResponseHandler($responseHandler);
        } catch (\Exception $e) {
            /** @var Api\Handler\Response\HandlerInterfaceException $responseHandler */
            $responseHandler = new HandlerException($e);
            
            /** Log the request response. */
            $logResponse = (new Response($this->getRequestId()))->importResponseExceptionHandler($responseHandler);
        }
        
        $this->logger()->logResponse($logResponse);
        
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
    
    
    /**
     * @return array
     */
    protected function protectedHeaders()
    {
        $headers = $this->_headers;
        
        if (isset($headers[Api::HEADER_USER_EMAIL])) {
            $headers[Api::HEADER_USER_EMAIL] = $this->protectValue($headers[Api::HEADER_USER_EMAIL]);
        }
    
        if (isset($headers[Api::HEADER_API_KEY])) {
            $headers[Api::HEADER_API_KEY] = $this->protectValue($headers[Api::HEADER_API_KEY]);
        }
    
        if (isset($headers[Api::HEADER_ACCOUNT_MANAGER_KEY])) {
            $headers[Api::HEADER_ACCOUNT_MANAGER_KEY] = $this->protectValue($headers[Api::HEADER_ACCOUNT_MANAGER_KEY]);
        }
        
        return $headers;
    }
    
    
    /**
     * @param string $value
     * @param string $char
     * @param float  $protectionAmount
     *
     * @return string
     */
    protected function protectValue($value, $char = '*', $protectionAmount = 0.5)
    {
        $len            = strlen($value);
        $protectionSize = (int) ($len * (float) $protectionAmount);
        
        $sidesAmount    = max((int) (($len-$protectionSize)/2), 0);
        
        $left   = substr($value, 0, $sidesAmount);
        $right  = substr($value, -$sidesAmount, $sidesAmount);
        $middle = str_repeat($char, $protectionSize);
        
        $value = implode([$left, $middle, $right]);
        
        return $value;
    }
    
}
