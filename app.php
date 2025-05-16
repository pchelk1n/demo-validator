<?php
declare(strict_types=1);

require_once 'vendor/autoload.php';

use App\FeedbackController;
use Symfony\Component\Validator\Validation;

$validator = Validation::createValidatorBuilder()
    ->enableAttributeMapping()
    ->getValidator();

$controller = new FeedbackController($validator);

$controller->processForm($_POST);


