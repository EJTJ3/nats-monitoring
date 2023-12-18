<?php

declare(strict_types=1);

namespace EJTJ3\NatsMonitoring\Model;

use JMS\Serializer\Annotation as Serializer;

final class MessageStatistics
{
    #[Serializer\SerializedName(name: 'msgs')]
    public int $messageCount;

    #[Serializer\SerializedName(name: 'bytes')]
    public int $byteCount;

    public function __construct(int $messages, int $bytes)
    {
        $this->messageCount = $messages;
        $this->byteCount = $bytes;
    }
}
