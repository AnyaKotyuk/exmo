<?php

namespace App\Communication\Request;

class Request
{
    private const REQUEST_URI_KEY = 'REQUEST_URI';
    private const PHP_AUTH_USER_KEY = 'PHP_AUTH_USER';
    private const PHP_AUTH_PW_KEY = 'PHP_AUTH_PW';
    private const REQUEST_METHOD_KEY = 'REQUEST_METHOD';

    /** @var Request|null $instance */
    private static $instance = null;

    /** @var string $request_uri */
    private static $requestUri;

    /** @var string|null $authUser */
    private static $authUser;

    /** @var string|null $authPassword */
    private static $authPassword;

    /** @var string $requestMethod */
    private static $requestMethod; // TODO: set as Enum

    private function __construct()
    {
        // disabled method
    }

    public static function init(): void
    {
        if (self::$instance === null) {
            $request = new static();

            $request->fillRequest();

            self::$instance = $request;
        }
    }

    private function fillRequest()
    {
        self::$requestUri = $_SERVER[self::REQUEST_URI_KEY];
        self::$authUser = $_SERVER[self::PHP_AUTH_USER_KEY];
        self::$authPassword = $_SERVER[self::PHP_AUTH_PW_KEY];
        self::$requestMethod = $_SERVER[self::REQUEST_METHOD_KEY];
    }

    public static function getRequestUri(): string
    {
        return self::$requestUri;
    }

    public static function getAuthUser(): ?string
    {
        return self::$authUser;
    }

    public static function getAuthPassword(): ?string
    {
        return self::$authPassword;
    }

    public static function getRequestMethod(): string
    {
        return self::$requestMethod;
    }
}