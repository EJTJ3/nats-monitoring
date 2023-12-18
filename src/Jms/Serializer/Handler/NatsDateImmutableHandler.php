<?php

declare(strict_types=1);

namespace EJTJ3\NatsMonitoring\Jms\Serializer\Handler;

use DateTimeImmutable;
use DateTimeZone;
use Exception;
use JMS\Serializer\Context;
use JMS\Serializer\GraphNavigatorInterface;
use JMS\Serializer\Handler\SubscribingHandlerInterface;
use JMS\Serializer\JsonDeserializationVisitor;

final class NatsDateImmutableHandler implements SubscribingHandlerInterface
{
    private static ?DateTimeZone $utc = null;

    /**
     * @return array<int, array{direction: int, format: string, type: string, method: string}>
     */
    public static function getSubscribingMethods(): array
    {
        return [
            [
                'direction' => GraphNavigatorInterface::DIRECTION_DESERIALIZATION,
                'format' => 'json',
                'type' => 'NatsDateTimeImmutable',
                'method' => 'deserializeDateTimeToJson',
            ],
        ];
    }

    /**
     * @param array<string, mixed> $type
     *
     * @throws Exception
     */
    public static function deserializeDateTimeToJson(
        JsonDeserializationVisitor $visitor,
        string $dateString,
        array $type,
        Context $context
    ): DateTimeImmutable {
        return new DateTimeImmutable(explode('.', $dateString)[0], self::getUtc());
    }

    private static function getUtc(): DateTimeZone
    {
        return self::$utc ??= new DateTimeZone('UTC');
    }
}
