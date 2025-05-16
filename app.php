<?php

require_once 'FeedbackData.php';

$error = false;

$feedbackData = FeedbackData::createFromRequest($_POST);

try {
    $feedbackData->validate();
} catch (\InvalidArgumentException $exception) {
    $error = true;
    echo $exception->getMessage();
}

if (!$error) {
    echo sprintf('<p style="color:green">Спасибо %s за вашу обратную связь</p>', $feedbackData->name);

    // отправка письма админу сайта о новой обратной связи
}

echo '<p><a href="index.html">Вернуться</a></p>';




