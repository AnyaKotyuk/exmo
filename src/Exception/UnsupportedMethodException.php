<?php

namespace App\Exception;

class UnsupportedMethodException extends BadRequestException
{
    private const UNSUPPORTED_METHOD = 'Method %s not allowed';

    public function __construct(string $method)
    {
        $msg = sprintf(self::UNSUPPORTED_METHOD, $method);
        parent::__construct($msg);
    }
}