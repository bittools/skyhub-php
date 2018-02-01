<?php

namespace SkyHub\Api\Log\TypeInterface;

interface TypeInterface
{
    
    /**
     * @return string
     */
    public function __toString();
    
    
    /**
     * @param string|array $id
     *
     * @return $this
     */
    public function setRequestId($id = null);
    
    
    /**
     * @param string|array $body
     *
     * @return $this
     */
    public function setBody($body = null);
    
    
    /**
     * @param string $message
     *
     * @return $this
     */
    public function setCustomMessage($message = null);
    
    
    /**
     * @param array $headers
     *
     * @return $this
     */
    public function setHeaders(array $headers = []);
    
    
    /**
     * @param string $version
     *
     * @return $this
     */
    public function setProtocolVersion($version = null);
}
