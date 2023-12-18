<?php

declare(strict_types=1);

namespace EJTJ3\NatsMonitoring\Model;

use EJTJ3\NatsMonitoring\Enum\ConnectionRequestSort;
use EJTJ3\NatsMonitoring\Enum\ConnectionRequestState;

/**
 * @see https://docs.nats.io/running-a-nats-service/nats_admin/monitoring#connection-information
 */
final class ConnectionRequest
{
    /**
     * Include username in response.
     */
    private bool $auth;

    /**
     * Include subscriptions.
     * When set to detail a list with more detailed subscription information will be returned.
     */
    private bool $subs;

    /**
     * Pagination offset. Default is 0.
     */
    private ?int $offset;

    /**
     * @var int|null Number of results to return. Default is 1024.
     */
    private ?int $limit;

    /**
     * Return a connection by its id.
     */
    private ?int $cid;

    /**
     * Return connections of particular state. Default is open.
     */
    private ?ConnectionRequestState $state;

    /**
     * Filter the connection with this MQTT client ID.
     */
    private ?string $mqttClient;

    private ?ConnectionRequestSort $sort;

    public function __construct()
    {
        $this->auth = false;
        $this->state = ConnectionRequestState::OPEN;
        $this->subs = true;
        $this->offset = null;
        $this->limit = null;
        $this->cid = null;
        $this->mqttClient = null;
        $this->sort = null;
    }

    public function isSubs(): bool
    {
        return $this->subs;
    }

    public function setSubs(bool $subs): void
    {
        $this->subs = $subs;
    }

    public function getOffset(): ?int
    {
        return $this->offset;
    }

    public function setOffset(?int $offset): void
    {
        $this->offset = $offset;
    }

    public function getLimit(): ?int
    {
        return $this->limit;
    }

    public function setLimit(?int $limit): void
    {
        $this->limit = $limit;
    }

    public function getCid(): ?int
    {
        return $this->cid;
    }

    public function setCid(?int $cid): void
    {
        $this->cid = $cid;
    }

    public function getMqttClient(): ?string
    {
        return $this->mqttClient;
    }

    public function setMqttClient(?string $mqttClient): void
    {
        $this->mqttClient = $mqttClient;
    }

    public function getSort(): ?ConnectionRequestSort
    {
        return $this->sort;
    }

    public function setSort(?ConnectionRequestSort $sort): void
    {
        $this->sort = $sort;
    }

    public function setAuth(bool $auth): void
    {
        $this->auth = $auth;
    }

    public function setState(?ConnectionRequestState $state): void
    {
        $this->state = $state;
    }

    /**
     * @return array<string, bool|int|string|null>
     */
    public function toArray(): array
    {
        return [
            'auth' => $this->auth,
            'subs' => $this->subs,
            'state' => $this->state?->value,
            'offset' => $this->offset,
            'limit' => $this->limit,
            'cid' => $this->cid,
            'mqtt_client' => $this->mqttClient,
            'sort' => $this->sort?->value,
        ];
    }
}
