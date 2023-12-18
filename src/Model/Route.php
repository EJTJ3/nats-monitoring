<?php

declare(strict_types=1);

namespace EJTJ3\NatsMonitoring\Model;

use DateInterval;
use DateTimeImmutable;
use JMS\Serializer\Annotation as Serializer;

final class Route
{
    #[Serializer\SerializedName(name: 'rid')]
    public int $rid;

    #[Serializer\SerializedName(name: 'remote_id')]
    public string $remoteId;

    #[Serializer\SerializedName(name: 'remote_name')]
    public string $remoteName;

    #[Serializer\SerializedName(name: 'did_solicit')]
    public bool $didSolicit;

    #[Serializer\SerializedName(name: 'is_configured')]
    public bool $isConfigured;

    #[Serializer\SerializedName(name: 'ip')]
    public string $ip;

    #[Serializer\SerializedName(name: 'port')]
    public int $port;

    #[Serializer\SerializedName(name: 'start')]
    #[Serializer\Type(name: 'NatsDateTimeImmutable')]
    public DateTimeImmutable $start;

    #[Serializer\SerializedName(name: 'last_activity')]
    #[Serializer\Type(name: 'NatsDateTimeImmutable')]
    public DateTimeImmutable $lastActivity;

    #[Serializer\SerializedName(name: 'rtt')]
    public string $rtt;

    #[Serializer\SerializedName(name: 'uptime')]
    #[Serializer\Type(name: 'NatsDateInterval')]
    public DateInterval $uptime;

    #[Serializer\SerializedName(name: 'idle')]
    public string $idle;

    #[Serializer\SerializedName(name: 'pending_size')]
    public int $pendingSize;

    #[Serializer\SerializedName(name: 'in_msgs')]
    public int $messagesIn = 0;

    #[Serializer\SerializedName(name: 'out_msgs')]
    public int $messagesOut = 0;

    #[Serializer\SerializedName(name: 'in_bytes')]
    public int $bytesIn = 0;

    #[Serializer\SerializedName(name: 'out_bytes')]
    public int $bytesOut = 0;

    #[Serializer\SerializedName(name: 'subscriptions')]
    public int $subscriptionCount = 0;

    public function __construct(
        int                $rid,
        string             $remoteId,
        string             $remoteName,
        bool               $didSolicit,
        bool               $isConfigured,
        string             $ip,
        int                $port,
        DateTimeImmutable $start,
        DateTimeImmutable  $lastActivity,
        string             $rtt,
        DateInterval       $uptime,
        string             $idle,
        int                $pendingSize,
        int                $messagesIn,
        int                $messagesOut,
        int                $bytesIn,
        int                $bytesOut,
        int                $subscriptionCount,
    ) {
        $this->rid = $rid;
        $this->remoteId = $remoteId;
        $this->remoteName = $remoteName;
        $this->didSolicit = $didSolicit;
        $this->isConfigured = $isConfigured;
        $this->ip = $ip;
        $this->port = $port;
        $this->start = $start;
        $this->lastActivity = $lastActivity;
        $this->rtt = $rtt;
        $this->uptime = $uptime;
        $this->idle = $idle;
        $this->pendingSize = $pendingSize;
        $this->messagesIn = $messagesIn;
        $this->messagesOut = $messagesOut;
        $this->bytesIn = $bytesIn;
        $this->bytesOut = $bytesOut;
        $this->subscriptionCount = $subscriptionCount;
    }
}
