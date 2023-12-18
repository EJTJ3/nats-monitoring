<?php

declare(strict_types=1);

namespace EJTJ3\NatsMonitoring\Model;

use DateTimeImmutable;
use JMS\Serializer\Annotation as Serializer;

final class AccountResponse
{
    #[Serializer\SerializedName(name: 'server_id')]
    public string $serverId;

    #[Serializer\Type(name: 'NatsDateTimeImmutable')]
    public DateTimeImmutable $now;

    #[Serializer\SerializedName(name: 'system_account')]
    public string $systemAccount;

    /**
     * @var array<string>
     */
    #[Serializer\Type(name: 'array<string>')]
    public array $accounts;

    /**
     * @param array<string> $accounts
     */
    public function __construct(
        string $serverId,
        DateTimeImmutable $now,
        array $accounts
    ) {
        $this->serverId = $serverId;
        $this->now = $now;
        $this->accounts = $accounts;
    }
}
