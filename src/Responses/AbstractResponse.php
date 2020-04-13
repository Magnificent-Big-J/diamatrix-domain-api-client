<?php

namespace Vooyd\DomainApiClient\Responses;

use Vooyd\DomainApiClient\Interfaces\ApiResponseInterface;

class AbstractResponse implements ApiResponseInterface
{
    protected int $responseCode;
    protected string $responseMessage;

    public function getResponseCode(): int
    {
        return $this->responseCode;
    }

    public function getResponseMessage(): string
    {
        return $this->responseMessage;
    }
}