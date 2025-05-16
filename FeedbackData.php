<?php

declare(strict_types=1);

final readonly class FeedbackData
{
    private function __construct(
        public string $name,
        public string $message,
    ) {}

    public static function createFromRequest(array $request): self
    {
        return new self(
            name: $request['name'] ?? '',
            message: $request['message'] ?? '',
        );
    }

    public function validate(): void
    {
        if ($this->name === '') {
            throw new InvalidArgumentException('<p style="color:red">Укажите имя...</p>');
        }

        if ($this->message === '') {
            throw new InvalidArgumentException('<p style="color:red">Укажите ваше сообщение...</p>');
        }
    }
}