<?php declare(strict_types=1);

namespace App\Shared\Infrastructure\Api;

use Symfony\Component\HttpFoundation\Response;
// @TODO refactor
final class ApiProblem
{
    public const TYPE_VALIDATION_ERROR = 'validation_error';

    public const TYPE_INVALID_REQUEST_BODY_FORMAT = 'invalid_body_format';

    public const TYPE_ACCOUNT_NOT_ENABLED = 'account_not_enabled';

    public const TYPE_INVALID_CREDENTIALS = 'invalid_credentials';

    public const TYPE_USER_NOT_FOUND = 'user_not_found';

    /** @var array|string[] */
    private static $titles = [
        self::TYPE_VALIDATION_ERROR => 'form.validation.error',
        self::TYPE_INVALID_REQUEST_BODY_FORMAT => 'form.validation.invalid_format',
        self::TYPE_ACCOUNT_NOT_ENABLED => 'form.account.not_enabled',
        self::TYPE_INVALID_CREDENTIALS => 'form.account.invalid_credentials',
        self::TYPE_USER_NOT_FOUND => 'form.account.user_not_found',
    ];

    /** @var int */
    private $statusCode;

    /** @var string */
    private $type;

    /** @var mixed|string */
    private $title;

    /** @var array|mixed[] */
    private $extraData = [];

    public function __construct(int $statusCode, ?string $type = null)
    {
        $this->statusCode = $statusCode;

        if ($type === null) {
            // no type? The default is about:blank and the title should
            // be the standard status code message
            $type = 'about:blank';
            $title = isset(Response::$statusTexts[$statusCode])
                ? Response::$statusTexts[$statusCode]
                : 'Unknown status code :(';
        } else {
            if (!isset(self::$titles[$type])) {
                throw new \InvalidArgumentException('No title for type ' . $type);
            }

            $title = self::$titles[$type];
        }

        $this->type = $type;
        $this->title = $title;
    }

    /**
     * @return array|mixed[]
     */
    public function toArray(): array
    {
        return array_merge(
            $this->extraData,
            [
                'status' => $this->statusCode,
                'type' => $this->type,
                'title' => $this->title,
            ]
        );
    }

    public function set(string $name, $value): void
    {
        $this->extraData[$name] = $value;
    }

    public function getStatusCode(): int
    {
        return $this->statusCode;
    }

    public function getTitle(): string
    {
        return $this->title;
    }
}