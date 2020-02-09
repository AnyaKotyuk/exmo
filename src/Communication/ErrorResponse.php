<?php

namespace App\Communication;

class ErrorResponse extends JsonResponse
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