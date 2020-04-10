<?php

declare(strict_types=1);

namespace App\Common\Infrastructure\Controller\Action;

use JMS\Serializer\SerializationContext;
use JMS\Serializer\SerializerInterface;
use Symfony\Component\HttpFoundation\Response;

abstract class AbstractAction
{
    /** @var SerializerInterface */
    protected SerializerInterface $serializer;

    public function __construct(SerializerInterface $serializer)
    {
        $this->serializer = $serializer;
    }

    protected function createApiResponse($data, int $statusCode = Response::HTTP_OK): Response
    {
        return new Response($this->serialize($data), $statusCode, [
            'Content-Type' => 'application/hal+json',
            'Access-Control-Allow-Origin' => '*',
        ]);
    }

    protected function serialize($data): string
    {
        $context = new SerializationContext();
        $context->setSerializeNull(true);

        return $this->serializer->serialize($data, 'json', $context);
    }
}