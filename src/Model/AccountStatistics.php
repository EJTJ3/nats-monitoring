<?php

declare(strict_types=1);

namespace EJTJ3\NatsMonitoring\Model;

use JMS\Serializer\Annotation as Serializer;

final class AccountStatistics
{
    #[Serializer\SerializedName(name: 'acc')]
    public string $account;

    #[Serializer\SerializedName(name: 'conns')]
    public int $connectionCount;

    #[Serializer\SerializedName(name: 'leafnodes')]
    public int $leafnodeCount;

    #[Serializer\SerializedName(name: 'total_conns')]
    public int $totalConnectionCount;

    #[Serializer\SerializedName(name: 'slow_consumers')]
    public int $slowConsumerCount;

    #[Serializer\SerializedName(name: 'sent')]
    public MessageStatistics $sentStatistics;

    #[Serializer\SerializedName(name: 'received')]
    public MessageStatistics $receivedStatistic;

    public function __construct(
        string $account,
        int $connectionCount,
        int $leafnodeCount,
        int $totalConnectionCount,
        int $slowConsumerCount,
        MessageStatistics $sentStatistics,
        MessageStatistics $receivedStatistic,
    ) {
        $this->account = $account;
        $this->connectionCount = $connectionCount;
        $this->leafnodeCount = $leafnodeCount;
        $this->totalConnectionCount = $totalConnectionCount;
        $this->slowConsumerCount = $slowConsumerCount;
        $this->sentStatistics = $sentStatistics;
        $this->receivedStatistic = $receivedStatistic;
    }
}
