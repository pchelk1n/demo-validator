<?php

declare(strict_types=1);

namespace App;

use Symfony\Component\Validator\Constraints as Assert;

final readonly class FeedbackData
{
    private function __construct(
        #[Assert\NotBlank(message: 'Укажите имя...')]
        public string $name,
        #[Assert\NotBlank(message: 'Укажите ваше сообщение...')]
        public string $message,
        #[Assert\NotBlank(message: 'Укажите ваш email...')]
        #[Assert\Email(message: 'Укажите корректный email...')]
        public string $email,
    ) {}

    public static function createFromRequest(array $request): self
    {
        return new self(
            name: $request['name'] ?? '',
            message: $request['message'] ?? '',
            email: $request['email'] ?? '',
        );
    }
}