<?php

declare(strict_types=1);

namespace EJTJ3\NatsMonitoring\Model;

use DateTimeImmutable;
use JMS\Serializer\Annotation as Serializer;
use DateInterval;

final class GeneralResponse
{
    #[Serializer\SerializedName(name: 'server_id')]
    public string $serverId;

    #[Serializer\SerializedName(name: 'server_name')]
    public string $serverName;

    #[Serializer\SerializedName(name: 'version')]
    public string $version;

    #[Serializer\SerializedName(name: 'proto')]
    public int $proto;

    #[Serializer\SerializedName(name: 'git_commit')]
    public string $gitCommit;

    #[Serializer\SerializedName(name: 'go')]
    public string $goVersion;

    #[Serializer\SerializedName(name: 'host')]
    public string $host;

    #[Serializer\SerializedName(name: 'port')]
    public int $port;

    #[Serializer\SerializedName(name: 'auth_required')]
    public bool $authRequired;

    #[Serializer\SerializedName(name: 'tls_required')]
    public bool $tlsRequired;

    /**
     * @var array<string>
     */
    #[Serializer\SerializedName(name: 'connect_urls')]
    #[Serializer\Type(name: 'array<string>')]
    public array $connectUrls = [];

    /**
     * @var array<string>
     */
    #[Serializer\SerializedName(name: 'ws_connect_urls')]
    #[Serializer\Type(name: 'array<string>')]
    public array $websocketConnectUrls = [];

    #[Serializer\SerializedName(name: 'max_connections')]
    public int $maxConnections;

    #[Serializer\SerializedName(name: 'max_subscriptions')]
    public int $maxSubscriptionCount;

    #[Serializer\SerializedName(name: 'ping_interval')]
    public int $pingInterval;

    #[Serializer\SerializedName(name: 'ping_max')]
    public int $maxPing;

    #[Serializer\SerializedName(name: 'http_host')]
    public string $httpHost;

    #[Serializer\SerializedName(name: 'http_port')]
    public int $httpPort;

    #[Serializer\SerializedName(name: 'http_base_path')]
    public string $httpBasePath;

    #[Serializer\SerializedName(name: 'http_port')]
    public int $httpsPort;

    /**
     * @var array<string, int>
     */
    #[Serializer\Type(name: 'array<string, int>')]
    public array $httpRequestStats;

    #[Serializer\SerializedName(name: 'auth_timeout')]
    public int $authTimeout;

    #[Serializer\SerializedName(name: 'max_control_line')]
    public int $maxControlLine;

    #[Serializer\SerializedName(name: 'max_payload')]
    public int $maxPayload;

    #[Serializer\SerializedName(name: 'max_pending')]
    public int $maxPending;

    #[Serializer\Type(name: GeneralCluster::class)]
    public ?GeneralCluster $cluster = null;

    #[Serializer\Type(name: GeneralMqtt::class)]
    public ?GeneralMqtt $mqtt = null;

    #[Serializer\Type(name: GeneralWebSocket::class)]
    public ?GeneralWebSocket $websocket = null;

    #[Serializer\Type(name: GeneralLeaf::class)]
    public ?GeneralLeaf $leaf = null;

    //    public $gateway;

    //    public $jetstream;
    #[Serializer\SerializedName(name: 'tls_timeout')]
    public int $tlsTimeout;

    #[Serializer\SerializedName(name: 'write_deadline')]
    public int $writeDeadline;

    #[Serializer\Type(name: 'NatsDateTimeImmutable')]
    public DateTimeImmutable $start;

    #[Serializer\Type(name: 'NatsDateTimeImmutable')]
    public DateTimeImmutable $now;

    #[Serializer\Type(name: 'NatsDateInterval')]
    public DateInterval $uptime;

    #[Serializer\SerializedName(name: 'mem')]
    public int $memory;

    #[Serializer\SerializedName(name: 'cores')]
    public int $coreCount;

    #[Serializer\SerializedName(name: 'gomaxprocs')]
    public int $golangMaxProcesses;

    public int $cpu;

    #[Serializer\SerializedName(name: 'connections')]
    public int $connectionCount;

    #[Serializer\SerializedName(name: 'total_connections')]
    public int $totalConnections;

    #[Serializer\SerializedName(name: 'routes')]
    public int $routeCount;

    #[Serializer\SerializedName(name: 'remotes')]
    public int $remoteCount;

    #[Serializer\SerializedName(name: 'leafnodes')]
    public int $leafnodeCount;

    #[Serializer\SerializedName(name: 'in_msgs')]
    public int $messagesIn;

    #[Serializer\SerializedName(name: 'out_msgs')]
    public int $messagesOut;

    #[Serializer\SerializedName(name: 'in_bytes')]
    public int $bytesIn = 0;

    #[Serializer\SerializedName(name: 'out_bytes')]
    public int $bytesOut = 0;

    #[Serializer\SerializedName(name: 'slow_consumers')]
    public int $slowConsumerCount;

    #[Serializer\SerializedName(name: 'subscriptions')]
    public int $subscriptionCount;

    #[Serializer\SerializedName(name: 'config_load_time')]
    public DateTimeImmutable $configLoadTime;

    #[Serializer\SerializedName(name: 'system_account')]
    public string $system_account;

    //    public $ocsp_peer_cache;

    /**
     * @var array<string>
     */
    #[Serializer\SerializedName(name: 'slow_consumer_stats')]
    #[Serializer\Type(name: 'array<string>')]
    public array $slowConsumerStats;
}
