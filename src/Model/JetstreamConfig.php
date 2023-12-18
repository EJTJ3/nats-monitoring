<?php

declare(strict_types=1);

namespace EJTJ3\NatsMonitoring\Model;

use JMS\Serializer\Annotation as Serializer;

final class JetstreamConfig
{
    #[Serializer\SerializedName(name: 'max_memory')]
    public int $maxMemory;

    #[Serializer\SerializedName(name: 'max_storage')]
    public int $maxStorage;

    #[Serializer\SerializedName(name: 'store_dir')]
    public string $storeDir;

    #[Serializer\SerializedName(name: 'compress_ok')]
    public bool $compressOk;

    public function __construct(
        int $maxMemory,
        int $maxStorage,
        string $storeDir,
        bool $compressOk
    ) {
        $this->maxMemory = $maxMemory;
        $this->maxStorage = $maxStorage;
        $this->storeDir = $storeDir;
        $this->compressOk = $compressOk;
    }
}
