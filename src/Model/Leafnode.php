<?php

declare(strict_types=1);

namespace EJTJ3\NatsMonitoring\Model;

use JMS\Serializer\Annotation as Serializer;

final class Leafnode
{
    #[Serializer\SerializedName(name: 'name')]
    public string $name;

    #[Serializer\SerializedName(name: 'is_spoke')]
    public bool $isSpoke;

    #[Serializer\SerializedName(name: 'account')]
    public string $account;

    #[Serializer\SerializedName(name: 'ip')]
    public string $ip;

    #[Serializer\SerializedName(name: 'port')]
    public int $port;

    #[Serializer\SerializedName(name: 'rtt')]
    public string $rtt;

    #[Serializer\SerializedName(name: 'in_msgs')]
    public int $messagesIn;

    #[Serializer\SerializedName(name: 'out_msgs')]
    public int $messagesOut;

    #[Serializer\SerializedName(name: 'in_bytes')]
    public int $bytesIn = 0;

    #[Serializer\SerializedName(name: 'out_bytes')]
    public int $bytesOut = 0;

    #[Serializer\SerializedName(name: 'subscriptions')]
    public int $subscriptionCount;

    public function __construct(
        string $name,
        bool   $isSpoke,
        string $account,
        string $ip,
        int    $port,
        string $rtt,
        int    $messagesIn,
        int    $messagesOut,
        int    $bytesIn,
        int    $bytesOut,
        int    $subscriptionCount
    ) {
        $this->name = $name;
        $this->isSpoke = $isSpoke;
        $this->account = $account;
        $this->ip = $ip;
        $this->port = $port;
        $this->rtt = $rtt;
        $this->messagesIn = $messagesIn;
        $this->messagesOut = $messagesOut;
        $this->bytesIn = $bytesIn;
        $this->bytesOut = $bytesOut;
        $this->subscriptionCount = $subscriptionCount;
    }
}
