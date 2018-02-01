<?php

namespace SkyHub;

use SkyHub\Api\Handler\Request\Getters as HandlerGetters;
use SkyHub\Api\Service\ServiceInterface;
use SkyHub\Api\Service\ServiceJson;

class Api implements ApiInterface
{
    
    use HandlerGetters;
    
    
    const HEADER_USER_EMAIL          = 'X-User-Email';
    const HEADER_API_KEY             = 'X-Api-Key';
    const HEADER_ACCOUNT_MANAGER_KEY = 'X-Accountmanager-Key';
    
    
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
            self::HEADER_USER_EMAIL          => $email,
            self::HEADER_API_KEY             => $apiKey,
            self::HEADER_ACCOUNT_MANAGER_KEY => $apiToken,
            'Accept'                         => 'application/json',
            'Content-Type'                   => 'application/json',
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
