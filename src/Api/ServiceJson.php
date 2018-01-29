<?php
namespace SkyHub\Api;

class ServiceJson extends ServiceAbstract
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
        $options[\GuzzleHttp\RequestOptions::JSON] = $body;
        return $this->request('POST', $uri, $options);
    }
    
    
    public function put($uri, $options)
    {
        return $this->request('PUT', $uri, $options);
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

}
