<?php
/**
 * B2W Digital - Companhia Digital
 *
 * Do not edit this file if you want to update this SDK for future new versions.
 * For support please contact the e-mail bellow:
 *
 * sdk@e-smart.com.br
 *
 * @category  SkyHub
 * @package   SkyHub
 *
 * @copyright Copyright (c) 2018 B2W Digital - BSeller Platform. (http://www.bseller.com.br).
 *
 * @author    Tiago Sampaio <tiago.sampaio@e-smart.com.br>
 * @author    Bruno Gemelli <bruno.gemelli@e-smart.com.br>
 */

namespace SkyHub\Api\Service;

use SkyHub\Api\Handler\Response\HandlerInterfaceException;
use SkyHub\Api\Handler\Response\HandlerInterfaceSuccess;

interface ServiceInterface
{
    /**
     * @var string
     */
    const REQUEST_METHOD_GET = 'GET';

    /**
     * @var string
     */
    const REQUEST_METHOD_POST = 'POST';

    /**
     * @var string
     */
    const REQUEST_METHOD_PUT = 'PUT';

    /**
     * @var string
     */
    const REQUEST_METHOD_HEAD = 'HEAD';

    /**
     * @var string
     */
    const REQUEST_METHOD_DELETE = 'DELETE';

    /**
     * @var string
     */
    const REQUEST_METHOD_PATCH = 'PATCH';

    /**
     * @var string
     */
    const DEFAULT_SERVICE_BASE_URI = 'https://api.skyhub.com.br';

    public function __construct($baseUri, array $headers = [], array $options = []);


    /**
     * @param string $uri
     * @param string $body
     * @param array  $options
     *
     * @return HandlerInterfaceException|HandlerInterfaceSuccess
     */
    public function post($uri, $body = null, array $options = []);

    /**
     * @param string $uri
     * @param string $body
     * @param array  $options
     *
     * @return HandlerInterfaceException|HandlerInterfaceSuccess
     */
    public function put($uri, $body = null, array $options = []);

    /**
     * @param string $uri
     * @param string $body
     * @param array  $options
     *
     * @return HandlerInterfaceException|HandlerInterfaceSuccess
     */
    public function patch($uri, $body = null, array $options = []);
    
    
    /**
     * @param string $uri
     * @param array  $options
     *
     * @return HandlerInterfaceException|HandlerInterfaceSuccess
     */
    public function get($uri, array $options = []);

    /**
     * @param string $uri
     * @param string $body
     * @param array  $options
     *
     * @return HandlerInterfaceException|HandlerInterfaceSuccess
     */
    public function delete($uri, $body = null, array $options = []);
    
    
    /**
     * @param string $uri
     * @param array  $options
     *
     * @return HandlerInterfaceException|HandlerInterfaceSuccess
     */
    public function head($uri, array $options = []);
    
    
    /**
     * @param string       $method
     * @param string       $uri
     * @param string|array $body
     * @param array        $options
     *
     * @return HandlerInterfaceException|HandlerInterfaceSuccess
     */
    public function request($method, $uri, $body = null, array $options = []);

    /**
     * @return array
     */
    public function getHeaders();

    /**
     * @param array $headers
     *
     * @return $this
     */
    public function setHeaders(array $headers = []);
}
