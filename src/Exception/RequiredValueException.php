<?php

namespace App\Exception;

class RequiredValueException extends BadRequestException
{
    private const FIELD_REQUIRED = 'Field %s is required';

    public function __construct(string $fieldName)
    {
        $msg = sprintf(self::FIELD_REQUIRED, $fieldName);
        parent::__construct($msg);
    }
}