<?php

use App\Routing;
use App\Service\AuthorizeService;
use App\Exception\NotAuthorizedException;
use App\Exception\BadRequestException;
use App\Exception\NotFoundException;
use App\Communication\Response\ErrorJsonResponse;
use App\Communication\Consts\StatusCode;
use App\Communication\Request\Request;

require_once 'autoload.php';

try {
    Request::init();

    $authorizeService = new AuthorizeService();
    $authorizeService->checkCredentials(Request::getAuthUser(), Request::getAuthPassword());

    $router = new Routing();
    $response = $router->getResponse(Request::getRequestUri());

    $statusCode = StatusCode::HTTP_OK;
} catch (BadRequestException $badRequestException) {
    $statusCode = StatusCode::HTTP_BAD_REQUEST;
    $response = new ErrorJsonResponse($badRequestException->getMessage());
} catch (NotAuthorizedException $notAuthorizedException) {
    $statusCode = StatusCode::HTTP_UNAUTHORIZED;
    $response = new ErrorJsonResponse($notAuthorizedException->getMessage());
} catch (NotFoundException $notFoundException) {
    $statusCode = StatusCode::HTTP_NOT_FOUND;
    $response = new ErrorJsonResponse($notFoundException->getMessage());
} catch (Exception $exception) {
    $statusCode = StatusCode::HTTP_INTERNAL_SERVER_ERROR;
    $response = new ErrorJsonResponse($exception->getMessage());
} finally {
    header(StatusCode::httpHeaderFor($statusCode));
    header('Content-Type: '.$response->getType());
    echo $response->getBody();
    exit;
}

