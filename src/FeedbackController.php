<?php

declare(strict_types=1);

namespace App;

use Symfony\Component\Validator\Validator\ValidatorInterface;

final readonly class FeedbackController
{
    public function __construct(
        private ValidatorInterface $validator,
    ) {}

    public function processForm(array $request): void
    {
        $feedbackData = FeedbackData::createFromRequest($request);

        $errors = $this->validator->validate($feedbackData);

        foreach ($errors as $error) {
            echo '<p style="color:red">', $error->getMessage(), '</p>';
        }

        if ($errors->count() === 0) {
            echo sprintf('<p style="color:green">Спасибо %s за вашу обратную связь</p>', $feedbackData->name);

            // отправка письма админу сайта о новой обратной связи
        }

        echo '<p><a href="index.html">Вернуться</a></p>';
    }
}