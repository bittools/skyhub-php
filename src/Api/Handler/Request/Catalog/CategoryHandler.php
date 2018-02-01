<?php

namespace SkyHub\Api\Handler\Request\Catalog;

use SkyHub\Api\Handler\Request\HandlerAbstract;
use SkyHub\Api\DataTransformers\Catalog\Category\Create as CreateTransformer;
use SkyHub\Api\DataTransformers\Catalog\Category\Update as UpdateTransformer;

class CategoryHandler extends HandlerAbstract
{

    /** @var string */
    protected $baseUrlPath = '/categories';


    /**
     * @return \SkyHub\Api\Handler\Response\HandlerInterface
     */
    public function categories()
    {
        /** @var \SkyHub\Api\Handler\Response\HandlerInterface $responseHandler */
        $responseHandler = $this->service()->get($this->baseUrlPath());
        return $responseHandler;
    }


    /**
     * @param string $code
     * @param string $name
     *
     * @return \SkyHub\Api\Handler\Response\HandlerInterface
     */
    public function create($code, $name)
    {
        $transformer = new CreateTransformer($code, $name);
        $body        = $transformer->output();

        /** @var \SkyHub\Api\Handler\Response\HandlerInterface $responseHandler */
        $responseHandler = $this->service()->post($this->baseUrlPath(), $body);

        return $responseHandler;
    }


    /**
     * @param string $code
     * @param string $name
     *
     * @return \SkyHub\Api\Handler\Response\HandlerInterface
     */
    public function update($code, $name)
    {
        $transformer = new UpdateTransformer($code, $name);
        $body        = $transformer->output();

        /** @var \SkyHub\Api\Handler\Response\HandlerInterface $responseHandler */
        $responseHandler = $this->service()->put($this->baseUrlPath($code), $body);

        return $responseHandler;
    }


    /**
     * @param string $code
     *
     * @return \SkyHub\Api\Handler\Response\HandlerInterface
     */
    public function delete($code)
    {
        /** @var \SkyHub\Api\Handler\Response\HandlerInterface $responseHandler */
        $responseHandler = $this->service()->delete($this->baseUrlPath($code));
        return $responseHandler;
    }
}
