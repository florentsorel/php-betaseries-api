<?php

declare(strict_types=1);

namespace Rtransat\Betaseries\Api;

use Rtransat\Betaseries\Api\Params\ParamsInterface;
use Rtransat\Betaseries\Api\Responses\Error;
use Rtransat\Betaseries\Client;
use Rtransat\Betaseries\Method;

abstract class AbstractApi
{
    public const API_VERSION = '3.0';

    private string $baseUrl = 'https://api.betaseries.com';

    public function __construct(private readonly Client $client)
    {
    }

    protected function get(string $path, ?ParamsInterface $parameters = null): array
    {
        $response = $this->request(Method::GET, $path, $parameters);

        $errors = [];
        if (isset($response['errors'])) {
            foreach ($response['errors'] as $error) {
                $errors[] = new Error($error['code'], $error['text']);
            }
        }

        $response['errors'] = $errors;

        return $response;
    }

    private function request(Method $method, $path, ?ParamsInterface $parameters): array
    {
        $params = $parameters->toArray();
        if (!empty($params)) {
            $path .= '?'.http_build_query($params);
        }

        $uri = sprintf('%s/%s', $this->baseUrl, ltrim($path, '/'));
        $request = $this->client->getHttpClient()->createRequest($method->name, $uri)
            ->withHeader('Content-Type', 'application/json')
            ->withHeader('X-BetaSeries-Key', $this->client->getApiKey())
            ->withHeader('X-BetaSeries-Version', self::API_VERSION);

        $response = $this->client->getHttpClient()->sendRequest($request);

        if ($response->getStatusCode() >= 400) {
            throw new \RuntimeException((string) $response->getBody());
        }

        $responseBody = (string) $response->getBody();

        return json_decode($responseBody, true, 512, JSON_THROW_ON_ERROR);
    }
}
