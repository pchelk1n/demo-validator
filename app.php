<?php
declare(strict_types=1);

require_once 'vendor/autoload.php';

use App\FeedbackData;
use Symfony\Component\Validator\Validation;

$feedbackData = FeedbackData::createFromRequest($_POST);

$validator = Validation::createValidatorBuilder()
    ->enableAttributeMapping()
    ->getValidator();

$errors = $validator->validate($feedbackData);

foreach ($errors as $error) {
    echo '<p style="color:red">', $error->getMessage(), '</p>';
}

if ($errors->count() === 0) {
    echo sprintf('<p style="color:green">Спасибо %s за вашу обратную связь</p>', $feedbackData->name);

    // отправка письма админу сайта о новой обратной связи
}

echo '<p><a href="index.html">Вернуться</a></p>';




