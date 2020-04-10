<?php declare(strict_types=1);

namespace App\Common\Infrastructure\Api;

use Symfony\Component\HttpKernel\Exception\HttpException;

// @TODO: refactor
final class ApiProblemException extends HttpException
{
    /** @var ApiProblem */
    private $apiProblem;

    /**
     * ApiProblemException constructor.
     *
     * @param array|mixed[] $headers
     */
    public function __construct(
        ApiProblem $apiProblem,
        ?\Throwable $previous = null,
        array $headers = [],
        int $code = 0
    ) {
        $this->apiProblem = $apiProblem;
        $statusCode = $apiProblem->getStatusCode();
        $message = $apiProblem->getTitle();

        parent::__construct($statusCode, $message, $previous, $headers, $code);
    }

    public function getApiProblem(): ApiProblem
    {
        return $this->apiProblem;
    }
}
