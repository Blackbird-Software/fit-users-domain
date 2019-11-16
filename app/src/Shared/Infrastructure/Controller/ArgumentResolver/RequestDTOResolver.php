<?php
declare(strict_types=1);

namespace App\Shared\Infrastructure\Controller\ArgumentResolver;

use App\Shared\Infrastructure\Api\ApiProblem;
use App\Shared\Infrastructure\Api\ApiProblemException;
use App\Shared\Infrastructure\Api\ResponseFactory;
use App\Shared\Infrastructure\DTO\RequestDTOInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Controller\ArgumentValueResolverInterface;
use Symfony\Component\HttpKernel\ControllerMetadata\ArgumentMetadata;
use Symfony\Component\Validator\ConstraintViolation;
use Symfony\Component\Validator\ConstraintViolationListInterface;
use Symfony\Component\Validator\Validator\ValidatorInterface;

// @TODO: refactor
final class RequestDTOResolver implements ArgumentValueResolverInterface
{
    /** @var ValidatorInterface */
    private $validator;

    public function __construct(ValidatorInterface $validator)
    {
        $this->validator = $validator;
    }

    public function supports(Request $request, ArgumentMetadata $argument): bool
    {
        $reflection = new \ReflectionClass($argument->getType());

        if ($reflection->implementsInterface(RequestDTOInterface::class)) {
            return true;
        }

        return false;
    }

    /**
     * @throws ApiProblemException
     */
    public function resolve(Request $request, ArgumentMetadata $argument): \Generator
    {
        // throw ApiProblemException if body is empty
        $data = json_decode($request->getContent(), true);

        if ($data === null && $request->headers
                ->contains('Content-Type', 'application/json')) {
            $apiProblem = new ApiProblem(Response::HTTP_BAD_REQUEST, ApiProblem::TYPE_INVALID_REQUEST_BODY_FORMAT);

            throw new ApiProblemException($apiProblem);
        }

        // creating new instance of custom request DTO
        $class = $argument->getType();
        $dto = new $class($request);

        // throw ApiProblemException in case of invalid request data
        $errors = $this->validator->validate($dto);

        if (count($errors) > 0) {
            $errors = $this->extractErrorsFromViolationList($errors);
            ResponseFactory::throwApiProblemValidationException($errors);
        }

        yield $dto;
    }

    /**
     * @return array|string[]
     */
    private function extractErrorsFromViolationList(ConstraintViolationListInterface $violations): array
    {
        $errors = [];

        /**
         * @var ConstraintViolation
         */
        foreach ($violations as $violation) {
            $propertyPath = $violation->getPropertyPath();
            $errors[$propertyPath][] = $violation->getMessage();
        }

        return $errors;
    }
}