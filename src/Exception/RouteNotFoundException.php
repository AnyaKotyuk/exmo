<?php

namespace App\Exception;

class RouteNotFoundException extends NotFoundException
{
    private const PAGE_NOT_FOUND_MSG = 'Page not found';

    public function __construct()
    {
        parent::__construct(self::PAGE_NOT_FOUND_MSG);
    }
}