<?php declare(strict_types=1);

namespace App\Infrastructure\Api;

use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Contracts\Translation\TranslatorInterface;

// @TODO: refactor
final class ResponseFactory
{
    /** @var TranslatorInterface */
    private $translator;

    public function __construct(TranslatorInterface $translator)
    {
        $this->translator = $translator;
    }

    public function createResponse(ApiProblem $apiProblem): JsonResponse
    {
        $data = $apiProblem->toArray();

        $data['title'] = $this->translator->trans($data['title'], [], 'validators');

        $response = new JsonResponse(
            $data,
            $apiProblem->getStatusCode()
        );

        $headers = $response->headers;
        $headers->set('Content-Type', 'application/problem+json');

        return $response;
    }

    /**
     * @param array|mixed[] $errors
     *
     * @throws ApiProblemException
     */
    public static function throwApiProblemValidationException(array $errors): void
    {
        $apiProblem = new ApiProblem(
            Response::HTTP_BAD_REQUEST,
            ApiProblem::TYPE_VALIDATION_ERROR
        );
        $apiProblem->set('errors', $errors);

        throw new ApiProblemException($apiProblem);
    }
}
