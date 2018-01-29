<?php

namespace SkyHub;

use SkyHub\Api\Handlers\Request\Getters as HandlerGetters;
use SkyHub\Api\Service\ServiceInterface;
use SkyHub\Api\Service\ServiceJson;

class Api implements ApiInterface
{
    
    use HandlerGetters;
    
    
    /** @var ServiceInterface */
    protected $_service = null;
    
    
    /**
     * Api constructor.
     *
     * @param string $baseUri
     * @param string $email
     * @param string $apiKey
     * @param string $apiToken
     * @param ServiceInterface $apiService
     */
    public function __construct($baseUri, $email, $apiKey, $apiToken, ServiceInterface $apiService = null)
    {
        $headers = [
            'X-User-Email'         => $email,
            'X-Api-Key'            => $apiKey,
            'X-Accountmanager-Key' => $apiToken,
            'Accept'               => 'application/json',
            'Content-Type'         => 'application/json',
        ];
        
        if (empty($apiServiceClass)) {
            $this->_service = new ServiceJson($baseUri, $headers);
            
            return;
        }
        
        $this->_service = $apiService;
    }
    
    
    /**
     * Gets a single connection instance.
     *
     * @return ServiceInterface
     */
    public function service()
    {
        return $this->_service;
    }
    
}
