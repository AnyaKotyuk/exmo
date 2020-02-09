<?php

namespace App\Controller;

use App\Communication\Response\HtmlResponse;
use App\Communication\Response\ResponseBodyInterface;

class BaseController extends AbstractController
{
    public function index(): ResponseBodyInterface
    {
        $response = new HtmlResponse();
        $response->setBody('Index page');

        return $response;
    }
}