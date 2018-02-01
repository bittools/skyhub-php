<?php
namespace SkyHub\Api\Service;

class ServiceJson extends ServiceDefault
{
    
    /**
     * Service constructor.
     *
     * @param string $baseUri
     * @param array  $headers
     * @param array  $options
     */
    public function __construct($baseUri, array $headers = [], array $options = [], $log = true)
    {
        $headers['Accept']       = 'application/json';
        $headers['Content-Type'] = 'application/json';
        
        parent::__construct($baseUri, $headers, $options, $log);
    }
    
    
    /**
     * @param array $bodyData
     * @param array $options
     *
     * @return array
     */
    protected function prepareRequestBody($bodyData, array &$options = [])
    {
        $options[\GuzzleHttp\RequestOptions::JSON] = $bodyData;
        return $options;
    }

}
