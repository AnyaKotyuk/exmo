<?php

namespace App\Exception;

use Exception;

class NotAuthorizedException extends Exception
{
    private const USER_NON_AUTHORIZED = 'User %s not authorized';

    public function __construct(string $username)
    {
        $msg = sprintf(self::USER_NON_AUTHORIZED, $username);
        parent::__construct($msg);
    }
}