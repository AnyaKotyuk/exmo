<?php

namespace App\Communication;

interface ResponseBodyInterface
{
    public function getBody(): string;

    public function getType(): string;
}