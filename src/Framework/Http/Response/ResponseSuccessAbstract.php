<?php

declare(strict_types = 1);

namespace Frenet\Framework\Http\Response;

/**
 * Class ResponseSuccessAbstract
 * @package Frenet\Framework\Http\Response
 */
abstract class ResponseSuccessAbstract extends ResponseAbstract implements ResponseSuccessInterface
{
    /**
     * @var \Psr\Http\Message\ResponseInterface
     */
    protected $responseObject;

    /**
     * @var \Frenet\Framework\Data\SerializerInterface
     */
    private $serializer;

    /**
     * ResponseSuccessAbstract constructor.
     *
     * @param \Psr\Http\Message\ResponseInterface $response
     */
    public function __construct(
        \Psr\Http\Message\ResponseInterface $response,
        \Frenet\Framework\Data\SerializerInterface $serializer
    ) {
        $this->responseObject = $response;
        $this->serializer = $serializer;
    }

    /**
     * {@inheritdoc}
     */
    public function getBody()
    {
        $json = (string) $this->responseObject->getBody();
        return (array) $this->serializer->unserialize($json);
    }

    /**
     * @return bool
     */
    public function success()
    {
        return true;
    }

    /**
     * @return bool
     */
    public function exception()
    {
        return false;
    }
}
