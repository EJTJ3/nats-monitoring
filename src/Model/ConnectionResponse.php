<?php

declare(strict_types=1);

namespace EJTJ3\NatsMonitoring\Model;

use DateTimeImmutable;
use JMS\Serializer\Annotation as Serializer;

final class ConnectionResponse
{
    #[Serializer\SerializedName(name: 'server_id')]
    public string $serverId;

    #[Serializer\Type(name: 'NatsDateTimeImmutable')]
    public DateTimeImmutable $now;

    #[Serializer\SerializedName(name: 'num_connections')]
    public int $numberOfConnections;

    public int $total;

    public int $offset;

    public int $limit;

    /**
     * @var array<Connection>
     */
    #[Serializer\Type(name: "array<EJTJ3\NatsMonitoring\Model\Connection>")]
    public array $connections;

    /**
     * @param array<Connection> $connections
     */
    public function __construct(
        string $serverId,
        DateTimeImmutable $now,
        int $numberOfConnections,
        int $total,
        int $offset,
        int $limit,
        array $connections
    ) {
        $this->serverId = $serverId;
        $this->now = $now;
        $this->numberOfConnections = $numberOfConnections;
        $this->total = $total;
        $this->offset = $offset;
        $this->limit = $limit;
        $this->connections = $connections;
    }
}
