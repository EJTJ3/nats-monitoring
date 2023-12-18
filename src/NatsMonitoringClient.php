<?php

declare(strict_types=1);

namespace EJTJ3\NatsMonitoring;

use EJTJ3\NatsMonitoring\Model\AccountResponse;
use EJTJ3\NatsMonitoring\Model\AccountStatisticsResponse;
use EJTJ3\NatsMonitoring\Model\ConnectionRequest;
use EJTJ3\NatsMonitoring\Model\ConnectionResponse;
use EJTJ3\NatsMonitoring\Model\GeneralResponse;
use EJTJ3\NatsMonitoring\Model\HealthResponse;
use EJTJ3\NatsMonitoring\Model\JetstreamResponse;
use EJTJ3\NatsMonitoring\Model\LeafnodeResponse;
use EJTJ3\NatsMonitoring\Model\RoutesResponse;
use EJTJ3\NatsMonitoring\Model\SubscriptionResponse;
use JMS\Serializer\SerializerInterface;
use Psr\Http\Client\ClientExceptionInterface;
use Psr\Http\Client\ClientInterface;
use InvalidArgumentException;

final class NatsMonitoringClient
{
    private const ROUTE_VARS = 'varz';

    private const ROUTE_CONNECTIONS = 'connz';

    private const ROUTE_HEALTH = 'healthz';

    private const ROUTE_SUBSCRIPTIONS = 'subsz';

    private const ROUTE_ACCOUNT_STATS = 'accstatz';

    private const ROUTE_JETSTREAM = 'jsz';

    private const ROUTE_ACCOUNTZ = 'accountz';

    private const ROUTE_ROUTEZ = 'routez';

    private const ROUTE_LEAFNODE = 'leafz';

    public function __construct(
        private readonly SerializerInterface $serializer,
        private readonly ClientInterface     $client,
        private readonly RequestBuilder      $requestBuilder = new RequestBuilder(),
    ) {
    }

    /**
     * @throws ClientExceptionInterface
     */
    public function getHealth(string $server): HealthResponse
    {
        return $this->doRequest($server, self::ROUTE_HEALTH, HealthResponse::class);
    }

    /**
     * @throws ClientExceptionInterface
     */
    public function getLeafnodes(string $server): LeafnodeResponse
    {
        return $this->doRequest($server, self::ROUTE_LEAFNODE, LeafnodeResponse::class);
    }

    /// ALLES HIER ONDER MOT NOG

    public function getRoutez(string $server): RoutesResponse
    {
        return $this->doRequest($server, self::ROUTE_ROUTEZ, RoutesResponse::class);
    }

    public function getGeneralSettings(string $server): GeneralResponse
    {
        return $this->doRequest($server, self::ROUTE_VARS, GeneralResponse::class);
    }

    public function getConnections(string $server, ConnectionRequest $request): ConnectionResponse
    {
        return $this->doRequest($server, self::ROUTE_CONNECTIONS, ConnectionResponse::class, $request->toArray());
    }

    /**
     * @throws ClientExceptionInterface
     */
    public function getJetstream(string $server): JetstreamResponse
    {
        return $this->doRequest($server, self::ROUTE_JETSTREAM, JetstreamResponse::class);
    }

    /**
     * @throws ClientExceptionInterface
     */
    public function getSubscriptions(string $server): SubscriptionResponse
    {
        return $this->doRequest($server, self::ROUTE_SUBSCRIPTIONS, SubscriptionResponse::class);
    }

    public function getAccountStats(string $server): AccountStatisticsResponse
    {
        return $this->doRequest($server, self::ROUTE_ACCOUNT_STATS, AccountStatisticsResponse::class);
    }

    public function getAccounts(string $server): AccountResponse
    {
        return $this->doRequest($server, self::ROUTE_ACCOUNTZ, AccountResponse::class);
    }

    /**
     * @phpstan-template T of object
     *
     * @param array<string, bool|int|string|null> $queryParams
     * @param class-string<T> $responseClass
     *
     * @phpstan-return T
     *
     * @throws ClientExceptionInterface
     */
    private function doRequest(string $server, string $path, string $responseClass, array $queryParams = []): object
    {
        $request = $this->requestBuilder->buildRequest(
            'GET',
            sprintf('%s/%s', $server, $path),
            $queryParams
        );

        $content = $this->client->sendRequest($request);

        if ($content->getStatusCode() !== 200) {
            throw new InvalidArgumentException('Invalid response from the server');
        }

        /** @var T $response */
        $response = $this->serializer->deserialize($content->getBody()->getContents(), $responseClass, 'json');

        return $response;
    }
}
