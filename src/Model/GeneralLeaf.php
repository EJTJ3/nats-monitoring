<?php

declare(strict_types=1);

namespace EJTJ3\NatsMonitoring\Model;

use JMS\Serializer\Annotation\SerializedName;

final class GeneralLeaf
{
    #[SerializedName(name: 'host')]
    public string $host;

    #[SerializedName(name: 'port')]
    public int $port;

    #[SerializedName('auth_timeout')]
    public int $authTimeout;

    #[SerializedName(name: 'tls_timeout')]
    public int $tlsTimeout;

    #[SerializedName(name: 'tls_required')]
    public bool $tlsRequired;

    public function __construct(
        string $host,
        int    $port,
        int    $authTimeout,
        int    $tlsTimeout,
        bool   $tlsRequired,
    ) {
        $this->host = $host;
        $this->port = $port;
        $this->authTimeout = $authTimeout;
        $this->tlsTimeout = $tlsTimeout;
        $this->tlsRequired = $tlsRequired;
    }
}
