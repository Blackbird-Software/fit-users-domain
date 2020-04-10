<?php

declare(strict_types=1);

namespace App\Common\Application\Message;

interface MessageRecorder
{
    public function add(CollectedMessage $message): void;

    public function lastMessage(): CollectedMessage;

    public function messages(): array;
}
