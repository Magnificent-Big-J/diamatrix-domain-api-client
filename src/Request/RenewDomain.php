<?php

namespace Vooyd\DomainApiClient\Request;

use Vooyd\DomainApiClient\Responses\RenewDomainResponse;
use Vooyd\DomainApiClient\Interfaces\ApiResponseInterface;

class RenewDomain extends AbstractRequest
{
    protected string $sld;
    protected string $tld;
    protected string $endpoint = 'renew';

    public function __construct(string $domain)
    {
        parent::__construct();

        $extract = $this->domainExtraction($domain);

        $this->sld = $extract['sld'];
        $this->tld = $extract['tld'];
    }

    public function getResponseObject(string $content): ApiResponseInterface
    {
        return new RenewDomainResponse($content);
    }
}
