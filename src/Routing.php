<?php

namespace App;

use App\Communication\ResponseBodyInterface;
use App\Controller\AbstractController;
use App\Exception\RouteNotFoundException;
use App\Exception\UnsupportedMethodException;

class Routing
{
    private const DEFAULT_CONTROLLER = 'Base';
    private const DEFAULT_GET_ACTION = 'index';
    private const CONTROLLER_SUFFIX = 'Controller';
    private const CONTROLLER_NAMESPACE = 'App\Controller';

    private const GET_METHOD = 'GET';

    /**
     * Get response for requested url
     * Where first part defines controller
     * Second: if numeric - resource id; not numeric - controller method
     * Third part defines source id
     *
     * @param string $url
     * @return ResponseBodyInterface
     * @throws RouteNotFoundException
     * @throws UnsupportedMethodException
     */
    public function getResponse(string $url): ResponseBodyInterface
    {
        $urlWithoutExtraSlashes = trim($url, '/');
        $pathList = explode('/', $urlWithoutExtraSlashes);

        $controllerName = $pathList[0] ?? null;
        $controller = $this->getController($controllerName);

        $methodName = $pathList[1] ?? null;
        $method = $this->getMethodName($methodName);

        $id = null;
        if ($method == self::DEFAULT_GET_ACTION) {
            $id = $pathList[1];
        } else {
            $id = $pathList[2];
        }

        return $controller->$method($id);
    }

    private function getController(?string $controllerName): AbstractController
    {
        if (!$controllerName) {
            $controllerName = self::DEFAULT_CONTROLLER;
        }

        $controller = self::CONTROLLER_NAMESPACE.'\\'.$controllerName . self::CONTROLLER_SUFFIX;

        if (class_exists($controller, true)) {
            return new $controller;
        }

        throw new RouteNotFoundException();
    }

    private function getMethodName(?string $methodName): string
    {
        if (!$methodName || is_numeric($methodName)) {
            if ($_SERVER['REQUEST_METHOD'] === self::GET_METHOD) {
                $methodName = self::DEFAULT_GET_ACTION; // TODO: move to separate consts
            } else {
                throw new UnsupportedMethodException($_SERVER['REQUEST_METHOD']);
            } // TODO: implement other methods support
        }

        return $methodName;
    }
}