<?php

namespace Vooyd\DomainApiClient\Interfaces;

/**
 * Interface ApiRequestInterface
 * @package Vooyd\DomainApiClient\Interfaces
 */
interface ApiRequestInterface
{
    public function getEndPoint(): string;
    public function getRequestParameters(): array;
    public function getResponseObject(string $content): ApiResponseInterface;
    public function domainExtraction(string  $domain): array;
}
