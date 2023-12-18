<?php

declare(strict_types=1);

namespace EJTJ3\NatsMonitoring\Jms\Serializer\Handler;

use EJTJ3\NatsMonitoring\Util\NatsDateUtil;
use Exception;
use JMS\Serializer\Context;
use JMS\Serializer\GraphNavigatorInterface;
use JMS\Serializer\Handler\SubscribingHandlerInterface;
use JMS\Serializer\JsonDeserializationVisitor;
use DateInterval;

final class NatsDateIntervalHandler implements SubscribingHandlerInterface
{
    /**
     * @return array<int, array{direction: int, format: string, type: string, method: string}>
     */
    public static function getSubscribingMethods(): array
    {
        return [
            [
                'direction' => GraphNavigatorInterface::DIRECTION_DESERIALIZATION,
                'format' => 'json',
                'type' => 'NatsDateInterval',
                'method' => 'deserializeDateTimeToJson',
            ],
        ];
    }

    /**
     * @param array<string, mixed> $type
     *
     * @throws Exception
     */
    public function deserializeDateTimeToJson(
        JsonDeserializationVisitor $visitor,
        string $interval,
        array $type,
        Context $context
    ): DateInterval {
        return NatsDateUtil::createDateInterval($interval);
    }
}
