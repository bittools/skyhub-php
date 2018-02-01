<?php

namespace SkyHub\Api\Log\TypeInterface;

interface TypeRequestInterface extends TypeInterface
{
    
    /**
     * @param string $method
     *
     * @return $this
     */
    public function setMethod($method = null);
    
    
    /**
     * @param string $uri
     *
     * @return $this
     */
    public function setUri($uri = null);
    
    
    /**
     * @param array $requestOptions
     *
     * @return $this
     */
    public function setOptions(array $requestOptions = []);
    
}
