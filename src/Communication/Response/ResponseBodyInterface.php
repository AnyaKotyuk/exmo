<?php

namespace App\Communication\Response;

interface ResponseBodyInterface
{
    public function getBody(): string;

    public function getType(): string;
}