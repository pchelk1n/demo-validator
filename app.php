<?php

$name = $_POST['name'] ?? '';
$message = $_POST['message'] ?? '';

$error = false;

if ($name === '') {
    echo '<p style="color:red">Укажите имя...</p>';
    $error = true;
}

if ($message === '') {
    echo '<p style="color:red">Укажите ваше сообщение...</p>';
    $error = true;
}

if (!$error) {
    echo sprintf('<p style="color:green">Спасибо %s за вашу обратную связь</p>', $name);

    // отправка письма админу сайта о новой обратной связи
}

echo '<p><a href="index.html">Вернуться</a></p>';




