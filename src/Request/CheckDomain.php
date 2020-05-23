<?php

namespace Vooyd\DomainApiClient\Request;

use Vooyd\DomainApiClient\Interfaces\ApiRequestInterface;
use Vooyd\DomainApiClient\Interfaces\ApiResponseInterface;
use Vooyd\DomainApiClient\Responses\CheckDomainResponse;

class CheckDomain extends AbstractRequest
{
    protected string $sld;
    protected string $tld;
    protected string $endpoint = 'check';

    public function __construct(string $domain)
    {
        parent::__construct();

        $extract = $this->domainExtraction($domain);

        $this->sld = $extract['sld'];
        $this->tld = $extract['tld'];
    }

    public function getResponseObject(string $contents): ApiResponseInterface
    {
        return new CheckDomainResponse($contents);
    }
}
