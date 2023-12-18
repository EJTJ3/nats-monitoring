<?php

declare(strict_types=1);

namespace EJTJ3\NatsMonitoring\Model;

use JMS\Serializer\Annotation\SerializedName;

final class GeneralMqtt
{
    #[SerializedName(name: 'host')]
    public string $host;

    #[SerializedName(name: 'port')]
    public int $port;

    #[SerializedName(name: 'no_auth_user')]
    public ?string $noAuthUser = null;

    #[SerializedName(name: 'tls_timeout')]
    public int $tlsTimeout;

    #[SerializedName(name: 'ack_wait')]
    public int $ackWait;

    #[SerializedName(name: 'max_ack_pending')]
    public int $maxAckPending;

    public function __construct(
        string  $host,
        int     $port,
        ?string $noAuthUser,
        int     $tlsTimeout,
        int     $ackWait,
        int     $maxAckPending,
    ) {
        $this->host = $host;
        $this->port = $port;
        $this->noAuthUser = $noAuthUser;
        $this->tlsTimeout = $tlsTimeout;
        $this->ackWait = $ackWait;
        $this->maxAckPending = $maxAckPending;
    }
}
