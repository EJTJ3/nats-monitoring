<?php

declare(strict_types=1);

namespace EJTJ3\NatsMonitoring\Model;

use JMS\Serializer\Annotation as Serializer;

final class JetstreamApi
{
    #[Serializer\SerializedName(name: 'total')]
    public int $totalCount = 0;

    #[Serializer\SerializedName(name: 'errors')]
    public int $errorCount = 0;

    public function __construct(int $totalCount, int $errorCount)
    {
        $this->totalCount = $totalCount;
        $this->errorCount = $errorCount;
    }
}
