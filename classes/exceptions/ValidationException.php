<?php

declare(strict_types=1);

namespace Dimsog\Comments\Classes\Exceptions;

use Throwable;
use InvalidArgumentException;

final class ValidationException extends InvalidArgumentException
{
    private array $errors;


    public function __construct(array $errors, int $code = 0, Throwable $previous = null)
    {
        parent::__construct(json_encode($errors), $code, $previous);
        $this->errors = $errors;
    }

    public function getErrors(): array
    {
        return $this->errors;
    }
}
