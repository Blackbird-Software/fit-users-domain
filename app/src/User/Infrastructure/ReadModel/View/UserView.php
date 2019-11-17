<?php
declare(strict_types=1);

namespace App\User\Infrastructure\ReadModel\View;
use Hateoas\Configuration\Annotation as Hateoas;

/**
 * @Hateoas\Relation(
 *      "self",
 *      href=@Hateoas\Route(
 *          "api_fetch_user",
 *          parameters={"id"="expr(object.id())"}
 *      ),
 *      attributes={"method": "GET"}
 * )
 * @Hateoas\Relation(
 *      "delete",
 *      href=@Hateoas\Route(
 *          "api_remove_user",
 *          parameters={"id"="expr(object.id())"}
 *      ),
 *      attributes={"method": "DELETE"}
 * )
 */
final class UserView
{
    private string $id;

    private string $firstname;

    private string $lastname;

    private string $email;

    private string $createdAt;

    private string $locale;

    /**
     * @throws \Exception
     */
    public function __construct(string $id, string $firstname, string $lastname, string $email, string $createdAt, string $locale)
    {
        $this->id = $id;
        $this->firstname = $firstname;
        $this->lastname = $lastname;
        $this->email = $email;
        $this->createdAt = $createdAt;
        $this->locale = $locale;
        // @TODO adjust to user's timezone
    }

    public function id(): string
    {
        return $this->id;
    }

    public function firstname(): string
    {
        return $this->firstname;
    }

    public function lastname(): string
    {
        return $this->lastname;
    }

    public function email(): string
    {
        return $this->email;
    }

    public function createdAt(): string
    {
        return $this->createdAt;
    }

    public function locale(): string
    {
        return $this->locale;
    }
}