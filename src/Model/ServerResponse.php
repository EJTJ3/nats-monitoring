<?php

//
//declare(strict_types=1);
//
//namespace EJTJ3\NatsMonitoring\Model;
//
//use JMS\Serializer\Annotation as Serializer;
//
//final class ServerResponse
//{
//    #[Serializer\SerializedName(name: 'server_id')]
//    public string $serverId
//    ;
//    #[Serializer\SerializedName(name: 'version')]
//    public string $version;
//    #[Serializer\SerializedName(name: 'proto')]
//    public int $protocol;
//    #[Serializer\SerializedName(name: 'go')]
//    public string $goVersion;
//
//    #[Serializer\SerializedName(name: 'host')]
//    public string $host;
//    #[Serializer\SerializedName(name: 'port')]
//    public int $port;
//    #[Serializer\SerializedName(name: 'max_connections')]
//    public int $maxConnections;
//    #[Serializer\SerializedName(name: 'ping_interval')]
//    public int $pingInterval;
//    #[Serializer\SerializedName(name: 'ping_max')]
//    public int $maxPing;
//    #[Serializer\SerializedName(name: 'http_host')]
//    public string $httpHost;
//    #[Serializer\SerializedName(name: 'http_port')]
//    public int $httpPort;
//    #[Serializer\SerializedName(name: 'https_port')]
//    public int $httpsPort;
//    #[Serializer\SerializedName(name: 'auth_timeout')]
//    public int $authTimeout;
//    #[Serializer\SerializedName(name: 'max_control_line')]
//    public int $maxControlLine;
//    #[Serializer\SerializedName(name: 'max_payload')]
//    public int $maxPayload;
//    #[Serializer\SerializedName(name: 'max_pending')]
//    public int $maxPending;
//    #[Serializer\SerializedName(name: '')]
//    public $cluster;
//    #[Serializer\SerializedName(name: '')]
//    public $gateway;
//    #[Serializer\SerializedName(name: '')]
//    public $leaf;
//    #[Serializer\SerializedName(name: '')]
//    public float $tls_timeout;
//    #[Serializer\SerializedName(name: '')]
//    public int $write_deadline;
//    #[Serializer\SerializedName(name: '')]
//    public string $start;
//    #[Serializer\SerializedName(name: '')]
//    #[Serializer\Type(name: 'NatsDateTimeImmutable')]
//
//    public string $now;
//    #[Serializer\SerializedName(name: '')]
//    public string $uptime;
//    #[Serializer\SerializedName(name: '')]
//    public int $mem;
//    #[Serializer\SerializedName(name: '')]
//    public int $cores;
//    #[Serializer\SerializedName(name: '')]
//    public int $gomaxprocs;
//    #[Serializer\SerializedName(name: '')]
//    public int $cpu;
//    #[Serializer\SerializedName(name: '')]
//    public int $connections;
//    #[Serializer\SerializedName(name: '')]
//    public int $total_connections;
//    #[Serializer\SerializedName(name: 'routes')]
//    public int $routCount;
//    #[Serializer\SerializedName(name: 'remotes')]
//    public int $remoteCount;
//    #[Serializer\SerializedName(name: 'leafnodes')]
//    public int $leafnodeCount;
//    #[Serializer\SerializedName(name: 'in_msgs')]
//    public int $receivedMessageCount;
//    #[Serializer\SerializedName(name: 'out_msgs')]
//    public int $sentMessagesCount;
//    #[Serializer\SerializedName(name: '')]
//    public int $in_bytes;
//    #[Serializer\SerializedName(name: '')]
//    public int $out_bytes;
//    #[Serializer\SerializedName(name: 'slow_consumers')]
//    public int $slowconsumerCount;
//    #[Serializer\SerializedName(name: 'subscriptions')]
//    public int $subscriptionCount;
//    #[Serializer\SerializedName(name: '')]
//    public $http_req_stats;
//    #[Serializer\SerializedName(name: '')]
//    public string $config_load_time;
//}
