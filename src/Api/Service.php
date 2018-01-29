<?php
namespace SkyHub\Api;

class Service extends ServiceAbstract
{
    
    /**
     * @param string       $uri
     * @param array|string $body
     * @param array        $options
     *
     * @return \Psr\Http\Message\ResponseInterface
     */
    public function post($uri, $body, array $options = [])
    {
        $options[\GuzzleHttp\RequestOptions::BODY] = $body;
        return $this->request('POST', $uri, $options);
    }
    
    
    /**
     * @param string $uri
     * @param string $body
     * @param array  $options
     *
     * @return \Psr\Http\Message\ResponseInterface
     */
    public function jsonPost($uri, $body, array $options = [])
    {
        $options[\GuzzleHttp\RequestOptions::JSON] = $body;
        return $this->request('POST', $uri, $options);
    }
    
    
    public function put($uri, $options)
    {
        return $this->request('PUT', $uri, $options);
    }
    
    
    public function jsonPut()
    {
    
    }
    
    
    public function get($uri, $options)
    {
        return $this->request('GET', $uri, $options);
    }
    
    
    /**
     * @param $uri
     * @param $options
     *
     * @return \Psr\Http\Message\ResponseInterface
     */
    public function head($uri, $options)
    {
        return $this->request('HEAD', $uri, $options);
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
        
        /** @var \Psr\Http\Message\ResponseInterface $response */
        $response = $this->httpClient()->request($method, $uri, $options);
        
        return $response;
    }

}
