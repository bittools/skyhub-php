<?php
namespace SkyHub\Api\Service;

class ServiceJson extends ServiceDefault
{
    
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
