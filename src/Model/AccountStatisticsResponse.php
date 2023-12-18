<?php

declare(strict_types=1);

namespace EJTJ3\NatsMonitoring\Model;

use DateTimeImmutable;
use JMS\Serializer\Annotation as Serializer;

final class AccountStatisticsResponse
{
    #[Serializer\SerializedName(name: 'server_id')]
    public string $serverId;

    #[Serializer\Type(name: 'NatsDateTimeImmutable')]
    public DateTimeImmutable $now;

    /**
     * @var array<AccountStatistics>
     */
    #[Serializer\Type('array<EJTJ3\NatsMonitoring\Model\AccountStatistics>')]
    public array $accountStatistics = [];

    /**
     * @param array<AccountStatistics> $accountStatistics
     */
    public function __construct(
        string $serverId,
        DateTimeImmutable $now,
        array $accountStatistics
    ) {
        $this->serverId = $serverId;
        $this->now = $now;
        $this->accountStatistics = $accountStatistics;
    }
}
