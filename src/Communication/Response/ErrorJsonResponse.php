<?php

namespace App\Communication\Response;

class ErrorJsonResponse extends JsonResponse
{
    /** @var string $errorMsg */
    private $errorMsg;

    public function __construct(string $errorMsg)
    {
        $this->errorMsg = $errorMsg;
    }

    public function getBody(): string
    {
        return json_encode(['error' => $this->errorMsg]);
    }
}