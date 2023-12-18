<?php

declare(strict_types=1);

namespace EJTJ3\NatsMonitoring\Model;

use DateTimeImmutable;
use JMS\Serializer\Annotation as Serializer;

final class LeafnodeResponse
{
    #[Serializer\SerializedName(name: 'server_id')]
    public string $server;

    #[Serializer\Type(name: 'NatsDateTimeImmutable')]
    public DateTimeImmutable $now;

    #[Serializer\SerializedName(name: 'leafnodes')]
    public int $leafnodeCount;

    /**
     * @var array<Leafnode>
     */
    #[Serializer\SerializedName(name: 'leafs')]
    #[Serializer\Type(name: 'array<int, EJTJ3\NatsMonitoring\Model\Leafnode>')]
    public ?array $leafnodes = [];

    /**
     * @param  array<Leafnode> $leafnodes
     */
    public function __construct(
        string $server,
        DateTimeImmutable $now,
        int $leafnodeCount,
        array $leafnodes,
    ) {
        $this->server = $server;
        $this->now = $now;
        $this->leafnodeCount = $leafnodeCount;
        $this->leafnodes = $leafnodes;
    }
}
