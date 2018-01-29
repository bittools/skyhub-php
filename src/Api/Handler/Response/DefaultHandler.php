<?php

namespace SkyHub\Api\Handlers\Response;

use Psr\Http\Message\ResponseInterface;

class DefaultHandler extends AbstractHandler
{
    
    /** @var ResponseInterface */
    protected $httpResponse = null;
    
    
    /**
     * DefaultHandler constructor.
     *
     * @param ResponseInterface $response
     */
    public function __construct(ResponseInterface $response)
    {
        $this->httpResponse = $response;
    }

}
