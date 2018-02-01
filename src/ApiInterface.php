<?php
namespace SkyHub;

use SkyHub\Api\Service\ServiceInterface;

interface ApiInterface
{
    
    /**
     * ApiInterface constructor.
     *
     * @param string                $baseUri
     * @param string                $email
     * @param string                $apiKey
     * @param string                $apiToken
     * @param ServiceInterface|null $apiService
     */
    public function __construct($baseUri, $email, $apiKey, $apiToken, ServiceInterface $apiService = null);
    
    
    /**
     * @return \SkyHub\Api\Service\ServiceInterface
     */
    public function service();
}
