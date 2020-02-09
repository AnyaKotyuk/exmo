<?php

namespace App\Exception;

class SourceNotFoundException extends NotFoundException
{
    private const SOURCE_NOT_FOUND_MSG = 'Source %s not found';

    public function __construct(string $source)
    {
        $msg = sprintf(self::SOURCE_NOT_FOUND_MSG, $source);
        parent::__construct($msg);
    }
}