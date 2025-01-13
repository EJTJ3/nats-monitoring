<?php

declare(strict_types=1);

namespace EJTJ3\NatsMonitoring\Model;

use DateInterval;
use DateTimeImmutable;
use JMS\Serializer\Annotation as Serializer;

final class Connection
{
    #[Serializer\SerializedName(name: 'cid')]
    public int $cid;

    #[Serializer\SerializedName(name: 'kind')]
    public string $kind;

    #[Serializer\SerializedName(name:'type')]
    public string $type;

    #[Serializer\SerializedName(name: 'ip')]
    public string $ip;

    #[Serializer\SerializedName(name: 'port')]
    public int $port;

    #[Serializer\Type(name: 'NatsDateTimeImmutable')]
    #[Serializer\SerializedName(name: 'start')]
    public DateTimeImmutable $start;

    #[Serializer\Type(name: 'NatsDateTimeImmutable')]
    #[Serializer\SerializedName(name: 'stop')]
    public ?DateTimeImmutable $stop = null;

    #[Serializer\Type(name: 'NatsDateTimeImmutable')]
    #[Serializer\SerializedName(name: 'last_activity')]
    public DateTimeImmutable $lastActivity;

    public string $rtt;

    #[Serializer\Type(name: 'NatsDateInterval')]
    public DateInterval $uptime;

    #[Serializer\Type(name: 'NatsDateInterval')]
    public DateInterval $idle;

    #[Serializer\SerializedName(name: 'pending_bytes')]
    public int $pendingBytes;

    #[Serializer\SerializedName(name: 'in_msgs')]
    public int $messagesIn;

    #[Serializer\SerializedName(name: 'out_msgs')]
    public int $messagesOut;

    #[Serializer\SerializedName(name: 'in_bytes')]
    public int $bytesIn = 0;

    #[Serializer\SerializedName(name: 'out_bytes')]
    public int $bytesOut = 0;

    #[Serializer\SerializedName(name: 'subscriptions')]
    public int $subscriptionCount = 0;

    public ?string $name = null;

    public ?string $lang = null;

    public ?string $version = null;

    public ?string $tls_version = null;

    #[Serializer\SerializedName(name: 'tls_cipher_suite')]
    public ?string $tlsCipherSuite = null;

    /**
     * @var array<int, string>
     */
    #[Serializer\Type('array<int, string>')]
    #[Serializer\SerializedName(name: 'subscriptions_list')]
    public ?array $subscriptionsList = [];

    public ?string $reason = null;

    public ?string $authorizedUser = null;

    /**
     * @param array<int, string> $subscriptionsList
     */
    public function __construct(
        int $cid,
        string $kind,
        string $type,
        string $ip,
        int $port,
        DateTimeImmutable $start,
        ?DateTimeImmutable $stop,
        DateTimeImmutable $last_activity,
        string $rtt,
        DateInterval $uptime,
        DateInterval $idle,
        int $pendingBytes,
        int $messagesIn,
        int $messagesOut,
        int $bytesIn,
        int $bytesOut,
        int $subscriptionCount,
        string $name,
        string $lang,
        string $version,
        ?string $reason,
        ?array $subscriptionsList = [],
        ?string $tlsCipherSuite = null,
        ?string $authorizedUser = null
    ) {
        $this->tls_version = null;
        $this->cid = $cid;
        $this->kind = $kind;
        $this->type = $type;
        $this->ip = $ip;
        $this->port = $port;
        $this->start = $start;
        $this->stop = $stop;
        $this->lastActivity = $last_activity;
        $this->rtt = $rtt;
        $this->uptime = $uptime;
        $this->idle = $idle;
        $this->pendingBytes = $pendingBytes;
        $this->messagesIn = $messagesIn;
        $this->messagesOut = $messagesOut;
        $this->bytesIn = $bytesIn;
        $this->bytesOut = $bytesOut;
        $this->subscriptionsList = $subscriptionsList;
        $this->subscriptionCount = $subscriptionCount;
        $this->name = $name;
        $this->lang = $lang;
        $this->version = $version;
        $this->reason = $reason;
        $this->tlsCipherSuite = $tlsCipherSuite;
        $this->authorizedUser = $authorizedUser;
    }
}
