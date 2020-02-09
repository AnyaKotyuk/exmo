<?php

namespace App\Communication\Response;

class HtmlResponse extends ResponseBody implements ResponseBodyInterface
{
    private const JSON_TYPE = 'text/html';

    public function getType(): string
    {
        return self::JSON_TYPE;
    }
}