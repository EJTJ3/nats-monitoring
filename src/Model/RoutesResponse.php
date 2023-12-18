<?php

declare(strict_types=1);

namespace EJTJ3\NatsMonitoring\Model;

use DateTimeImmutable;
use JMS\Serializer\Annotation as Serializer;
use JMS\Serializer\Annotation\SerializedName;

final class RoutesResponse
{
    #[Serializer\SerializedName(name: 'server_id')]
    public string $serverId;

    #[Serializer\SerializedName(name: 'server_name')]
    public string $serverName;

    #[Serializer\Type(name: 'NatsDateTimeImmutable')]
    public DateTimeImmutable $now;

    #[SerializedName('num_routes')]
    public int $routesCount = 0;

    /**
     * @var array<Route>
     */
    #[Serializer\Type(name: 'array<EJTJ3\NatsMonitoring\Model\Route>')]
    public array $routes;

    /**
     * @param array<Route> $routes
     */
    public function __construct(
        string $serverId,
        string $serverName,
        DateTimeImmutable $now,
        int $routesCount,
        array $routes
    ) {
        $this->serverId = $serverId;
        $this->serverName = $serverName;
        $this->now = $now;
        $this->routesCount = $routesCount;
        $this->routes = $routes;
    }
}
