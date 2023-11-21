<?php

declare(strict_types=1);

namespace Rtransat\Betaseries;

use Http\Discovery\Psr18Client;
use Rtransat\Betaseries\Api\Shows;
use Rtransat\Betaseries\Contracts\Api\Api;
use Rtransat\Betaseries\Exceptions\ApiNotFoundException;

/**
 * @method Shows shows
 */
final class Client
{
    private Psr18Client $httpClient;

    public function __construct(
        private readonly string $apiKey
    ) {
        $this->httpClient = new Psr18Client();
    }

    public function getApiKey(): string
    {
        return $this->apiKey;
    }

    public function getHttpClient(): Psr18Client
    {
        return $this->httpClient;
    }

    public function __call(string $name, array $arguments): Api
    {
        $class = sprintf('Rtransat\\Betaseries\\Api\\%s', ucfirst($name));

        if (class_exists($class) === false) {
            throw new ApiNotFoundException(sprintf('Class "%s" not found', $class));
        }

        return new $class($this);
    }
}
