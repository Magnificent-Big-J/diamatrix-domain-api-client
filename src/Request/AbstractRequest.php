<?php

namespace Vooyd\DomainApiClient\Request;

use Vooyd\DomainApiClient\Interfaces\ApiRequestInterface;

abstract class AbstractRequest implements ApiRequestInterface
{
    protected string $key;

    protected array $paramsBlackList = [
        'paramsBlackList',
        'endpoint'
    ];

    public function __construct()
    {
        $this->key = config('domain.apiKey');
    }

    protected function fill(array $inputs)
    {
        foreach ($inputs as $key => $value) {
            if (property_exists(get_class($this), $key)) {
                $this->{$key} = $value;
            }
        }
    }

    public function getRequestParameters(): array
    {
        $reflector = new \ReflectionObject($this);
        $params = [];

        foreach ($reflector->getProperties() as $property) {
            if (!in_array($property->name, $this->paramsBlackList) && isset( $this->{$property->name})) {
                $params[$property->name] =  $this->{$property->name};
            }
        }

        return $params;
    }

    public function getEndPoint(): string
    {
        return $this->endpoint;
    }
    public function domainExtraction(string $domain): array
    {
        $sidPosition = strpos($domain, '.');

        return [ 'sld' => substr($domain, 0, $sidPosition),
                 'tld' => substr($domain, $sidPosition + 1)
        ];
    }
}
