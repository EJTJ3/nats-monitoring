<?php

declare(strict_types=1);

namespace EJTJ3\NatsMonitoring\Model;

use JMS\Serializer\Annotation as Serializer;

final class GeneralWebSocket
{
    #[Serializer\SerializedName(name: 'host')]
    public string $host;

    #[Serializer\SerializedName(name: 'port')]
    public int $port;

    #[Serializer\SerializedName(name: 'no_auth_user')]
    public ?string $noAuthUser = null;

    #[Serializer\SerializedName(name: 'handshake_timeout')]
    public int $handshakeTimeout = 0;

    #[Serializer\SerializedName(name: 'compression')]
    public bool $compression = false;

    public function __construct(
        string  $host,
        int     $port,
        ?string $noAuthUser = null,
        int     $handshakeTimeout = 0,
        bool    $compression = false,
    ) {
        $this->host = $host;
        $this->port = $port;
        $this->noAuthUser = $noAuthUser;
        $this->handshakeTimeout = $handshakeTimeout;
        $this->compression = $compression;
    }
}
