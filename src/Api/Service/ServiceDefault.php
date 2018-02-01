<?php
namespace SkyHub\Api\Service;

use SkyHub\Api\Handler\Response\HandlerInterface;
use SkyHub\Api\Handler\Response\HandlerInterfaceException;
use SkyHub\Api\Handler\Response\HandlerInterfaceSuccess;

class ServiceDefault extends ServiceAbstract
{
    
    /**
     * @param string       $uri
     * @param array|string $body
     * @param array        $options
     *
     * @return HandlerInterfaceException|HandlerInterfaceSuccess
     */
    public function post($uri, $body = null, array $options = [])
    {
        return $this->request(self::REQUEST_METHOD_POST, $uri, $body, $options);
    }
    
    
    /**
     * @param string $uri
     * @param string $body
     * @param array  $options
     *
     * @return HandlerInterfaceException|HandlerInterfaceSuccess
     */
    public function put($uri, $body = null, array $options = [])
    {
        return $this->request(self::REQUEST_METHOD_PUT, $uri, $body, $options);
    }


    /**
     * @param string $uri
     * @param string $body
     * @param array  $options
     *
     * @return HandlerInterfaceException|HandlerInterfaceSuccess
     */
    public function patch($uri, $body = null, array $options = [])
    {
        return $this->request(self::REQUEST_METHOD_PATCH, $uri, $body, $options);
    }
    
    
    /**
     * @param $uri
     * @param $options
     *
     * @return HandlerInterfaceException|HandlerInterfaceSuccess
     */
    public function get($uri, array $options = null)
    {
        return $this->request(self::REQUEST_METHOD_GET, $uri, $options);
    }


    /**
     * @param string $uri
     * @param string $body
     * @param array  $options
     *
     * @return HandlerInterfaceException|HandlerInterfaceSuccess
     */
    public function delete($uri, $body = null, array $options = [])
    {
        return $this->request(self::REQUEST_METHOD_DELETE, $uri, $options);
    }
    
    
    /**
     * @param $uri
     * @param $options
     *
     * @return HandlerInterfaceException|HandlerInterfaceSuccess
     */
    public function head($uri, array $options = null)
    {
        return $this->request(self::REQUEST_METHOD_HEAD, $uri, $options);
    }

}
