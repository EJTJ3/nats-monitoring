<?php

declare(strict_types=1);

namespace Test\EJTJ3\NatsMonitoring;

use EJTJ3\NatsMonitoring\Jms\Serializer\Handler\NatsDateImmutableHandler;
use EJTJ3\NatsMonitoring\Jms\Serializer\Handler\NatsDateIntervalHandler;
use EJTJ3\NatsMonitoring\NatsMonitoringClient;
use Http\Discovery\Psr18Client;
use JMS\Serializer\Handler\HandlerRegistry;
use JMS\Serializer\SerializerBuilder;
use JMS\Serializer\SerializerInterface;
use PHPUnit\Framework\TestCase;
use DateTimeImmutable;

abstract class AbstractTestClient extends TestCase
{
    private static ?NatsMonitoringClient $client = null;

    public static function isUtcTimezone(?DateTimeImmutable $date): void
    {
        self::assertSame('UTC', $date->getTimezone()->getName());
    }

    public static function getClient(): NatsMonitoringClient
    {
        if (self::$client === null) {
            $serializer = self::buildSerializer();

            self::$client = new NatsMonitoringClient(
                $serializer,
                new Psr18Client(),
            );
        }

        return  self::$client;
    }

    private static function buildSerializer(): SerializerInterface
    {
        $serializerBuilder = SerializerBuilder::create();
        $serializerBuilder->configureHandlers(static function (HandlerRegistry $registry): void {
            $registry->registerSubscribingHandler(new NatsDateIntervalHandler());
            $registry->registerSubscribingHandler(new NatsDateImmutableHandler());
        });

        return $serializerBuilder->build();
    }
}
