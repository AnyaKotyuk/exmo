<?php

namespace App\Service;

use App\Exception\NotAuthorizedException;
use App\Exception\RequiredValueException;

class AuthorizeService
{
    private const USERNAME = 'superuser';
    private const PASSWORD = 'superpassword';

    /**
     * Checks user credentials
     *
     * @param string $username
     * @param string $password
     * @throws NotAuthorizedException
     * @throws RequiredValueException
     */
    public function checkCredentials(?string $username, ?string $password): void
    {
        if (!$username) {
            throw new RequiredValueException('username');
        }
        if ($username != self::USERNAME || $password != self::PASSWORD) {
            throw new NotAuthorizedException($username);
        }
    }
}