<?php

declare(strict_types=1);

namespace EJTJ3\NatsMonitoring\Model;

use DateTimeImmutable;
use JMS\Serializer\Annotation as Serializer;

final class JetstreamResponse
{
    #[Serializer\SerializedName(name: 'server_id')]
    public string $server;

    #[Serializer\Type(name: 'NatsDateTimeImmutable')]
    #[Serializer\SerializedName(name: 'now')]
    public DateTimeImmutable $now;

    #[Serializer\SerializedName(name: 'config')]
    public JetstreamConfig $config;

    #[Serializer\SerializedName(name: 'memory')]
    public int $memory;

    #[Serializer\SerializedName(name: 'storage')]
    public int $storage;

    #[Serializer\SerializedName(name: 'reserved_memory')]
    public int $reservedMemory;

    #[Serializer\SerializedName(name: 'reserved_storage')]
    public int $reservedStorage;

    #[Serializer\SerializedName(name: 'accounts')]
    public int $accountCount;

    #[Serializer\SerializedName(name: 'ha_assets')]
    public int $haAssets;

    #[Serializer\SerializedName(name: 'api')]
    public JetstreamApi $jetstreamApi;

    #[Serializer\SerializedName(name: 'streams')]
    public int $streamCount;

    #[Serializer\SerializedName(name: 'consumers')]
    public int $consumerCount;

    #[Serializer\SerializedName(name: 'messages')]
    public int $messageCount;

    #[Serializer\SerializedName(name: 'bytes')]
    public int $byteCount;

    public function __construct(
        string $server,
        DateTimeImmutable $now,
        JetstreamConfig $config,
        int $memory,
        int $storage,
        int $reservedMemory,
        int $reservedStorage,
        int $accountCount,
        int $haAssets,
        JetstreamApi $jetstreamApi,
        int $streamCount,
        int $consumerCount,
        int $messageCount,
        int $byteCount,
    ) {
        $this->server = $server;
        $this->now = $now;
        $this->jetstreamApi = $jetstreamApi;
        $this->config = $config;
        $this->memory = $memory;
        $this->storage = $storage;
        $this->reservedMemory = $reservedMemory;
        $this->reservedStorage = $reservedStorage;
        $this->accountCount = $accountCount;
        $this->haAssets = $haAssets;
        $this->streamCount = $streamCount;
        $this->consumerCount = $consumerCount;
        $this->messageCount = $messageCount;
        $this->byteCount = $byteCount;
    }
}
