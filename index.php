<?php

use App\Routing;
use App\Service\AuthorizeService;
use App\Exception\NotAuthorizedException;
use App\Exception\BadRequestException;
use App\Exception\NotFoundException;
use App\Communication\ErrorResponse;
use App\Communication\StatusCode;

require_once 'autoload.php';

try {
    $authorizeService = new AuthorizeService();
    $authorizeService->checkCredentials($_SERVER['PHP_AUTH_USER'], $_SERVER['PHP_AUTH_PW']);

    $router = new Routing();
    $url = $_SERVER['REQUEST_URI'];
    $response = $router->getResponse($url);

    $statusCode = StatusCode::HTTP_OK;
} catch (BadRequestException $exception) {
    $statusCode = StatusCode::HTTP_BAD_REQUEST;
    $response = new ErrorResponse($exception->getMessage());
} catch (NotAuthorizedException $exception) {
    $statusCode = StatusCode::HTTP_UNAUTHORIZED;
    $response = new ErrorResponse($exception->getMessage());
} catch (NotFoundException $exception) {
    $statusCode = StatusCode::HTTP_NOT_FOUND;
    $response = new ErrorResponse($exception->getMessage());
} catch (Exception $exception) {
    $statusCode = StatusCode::HTTP_INTERNAL_SERVER_ERROR;
    $response = new ErrorResponse($exception->getMessage());
} finally {
    header(StatusCode::httpHeaderFor($statusCode));
    header('Content-Type: '.$response->getType());
    echo $response->getBody();
    exit;
}

