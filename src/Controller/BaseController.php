<?php

namespace App\Controller;

use App\Communication\HtmlResponse;
use App\Communication\ResponseBodyInterface;

class BaseController extends AbstractController
{
    public function index(): ResponseBodyInterface
    {
        $response = new HtmlResponse();
        $response->setBody('Index page');

        return $response;
    }
}