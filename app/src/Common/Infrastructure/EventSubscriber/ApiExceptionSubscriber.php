<?php declare(strict_types=1);

namespace App\Common\Infrastructure\EventSubscriber;

use App\Common\Infrastructure\Api\ApiProblem;
use App\Common\Infrastructure\Api\ApiProblemException;
use App\Common\Infrastructure\Api\ResponseFactory;
use Psr\Log\LoggerInterface;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\HttpKernel\Event\ExceptionEvent;
use Symfony\Component\HttpKernel\Exception\HttpExceptionInterface;
use Symfony\Component\HttpKernel\KernelEvents;

// @TODO refactor
final class ApiExceptionSubscriber implements EventSubscriberInterface
{
    private bool $debug;

    private ResponseFactory $responseFactory;

    private LoggerInterface $logger;

    public function __construct(ResponseFactory $responseFactory, LoggerInterface $logger, bool $debug = false)
    {
        $this->responseFactory = $responseFactory;
        $this->logger = $logger;
        $this->debug = $debug;
    }

    public function onKernelException(ExceptionEvent $event): void
    {
        $request = $event->getRequest();
        // only reply to /api URLs
        if (strpos($request->getPathInfo(), '/api') !== 0) {
            return;
        }

        $exception = $event->getException();

        $statusCode = $exception instanceof HttpExceptionInterface ? $exception->getStatusCode() : 500;

        // allow 500 errors to be thrown
        if ($this->debug && $statusCode >= 500) {
            return;
        }

        $this->logException($exception);

        if ($exception instanceof ApiProblemException) {
            $apiProblem = $exception->getApiProblem();
        } else {
            $apiProblem = new ApiProblem(
                $statusCode
            );

            /*
             * If it's an HttpException message (e.g. for 404, 403),
             * we'll say as a rule that the exception message is safe
             * for the client. Otherwise, it could be some sensitive
             * low-level exception, which should *not* be exposed
             */
            if ($exception instanceof HttpExceptionInterface) {
                $apiProblem->set('detail', $exception->getMessage());
            }
        }

        $response = $this->responseFactory->createResponse($apiProblem);

        $event->setResponse($response);
    }

    /**
     * @return array|string[]
     */
    public static function getSubscribedEvents(): array
    {
        return [
            KernelEvents::EXCEPTION => 'onKernelException',
        ];
    }

    private function logException(\Throwable $exception): void
    {
        $message = sprintf(
            'Uncaught PHP Exception %s: "%s" at %s line %s',
            \get_class($exception),
            $exception->getMessage(),
            $exception->getFile(),
            $exception->getLine()
        );
        $isCritical = !$exception instanceof HttpExceptionInterface || $exception->getStatusCode() >= 500;
        $context = ['exception' => $exception];
        if ($isCritical) {
            $this->logger->critical($message, $context);
        } else {
            $this->logger->error($message, $context);
        }
    }
}
