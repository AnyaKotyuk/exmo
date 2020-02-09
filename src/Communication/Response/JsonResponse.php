<?php

namespace App\Communication\Response;

class JsonResponse extends ResponseBody implements ResponseBodyInterface
{
    private const JSON_TYPE = 'application/json';

    public function getType(): string
    {
        return self::JSON_TYPE;
    }
}