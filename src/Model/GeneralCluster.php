<?php

declare(strict_types=1);

namespace EJTJ3\NatsMonitoring\Model;

use JMS\Serializer\Annotation as Serializer;
use JMS\Serializer\Annotation\SerializedName;

final class GeneralCluster
{
    #[SerializedName(name: 'name')]
    public string $name;

    #[SerializedName(name: 'addr')]
    public string $addr;

    #[SerializedName(name: 'clusterPort')]
    public int $cluster_port;

    #[SerializedName('auth_timeout')]
    public int $authTimeout;

    /** @var string[] $urls */
    #[Serializer\Type(name: 'array<string>')]
    public array $urls;

    #[SerializedName(name: 'tls_timeout')]
    public int $tlsTimeout;

    #[SerializedName(name: 'tls_required')]
    public bool $tlsRequired;

    #[SerializedName(name: 'tls_verify')]
    public bool $tlsVerify;

    /**
     * @param array<string> $urls
     */
    public function __construct(
        string $name,
        string $addr,
        int $cluster_port,
        int $authTimeout,
        array $urls,
        int $tlsTimeout,
        bool $tlsRequired,
        bool $tlsVerify,
    ) {
        $this->name = $name;
        $this->addr = $addr;
        $this->cluster_port = $cluster_port;
        $this->authTimeout = $authTimeout;
        $this->urls = $urls;
        $this->tlsTimeout = $tlsTimeout;
        $this->tlsRequired = $tlsRequired;
        $this->tlsVerify = $tlsVerify;
    }
}
