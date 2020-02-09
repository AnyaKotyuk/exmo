<?php

namespace App\Communication;

abstract class ResponseBody
{
    /** @var string $body */
    protected $body;

    public function getBody(): string
    {
        return $this->body;
    }

    public function setBody(string $body): void
    {
        $this->body = $body;
    }
}