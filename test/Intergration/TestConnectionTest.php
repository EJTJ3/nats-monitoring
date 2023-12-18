<?php

declare(strict_types=1);

namespace Test\EJTJ3\NatsMonitoring\Intergration;

use EJTJ3\NatsMonitoring\Model\ConnectionRequest;
use Test\EJTJ3\NatsMonitoring\AbstractTestClient;
use Test\EJTJ3\NatsMonitoring\Constant;
use DateTimeImmutable;
use DateInterval;

final class TestConnectionTest extends AbstractTestClient
{
    public function testConnections(): void
    {
        $response = self::getClient()->getConnections(Constant::DEMO_SERVER, new ConnectionRequest());

        self::assertNotEmpty($response->serverId);

        $connections = $response->connections;
        shuffle($connections);

        // Limit connections to max x elements
        foreach (array_slice($connections, 0, 150) as $connection) {
            self::assertIsNumeric($connection->cid);
            self::assertNotEmpty($connection->kind);
            self::assertNotEmpty($connection->type);
            self::assertNotEmpty($connection->ip);
            self::assertIsNumeric($connection->port);
            self::assertNotEmpty($connection->start);
            self::assertInstanceOf(DateTimeImmutable::class, $connection->start);
            self::assertInstanceOf(DateTimeImmutable::class, $connection->lastActivity);
            self::assertNotEmpty($connection->rtt);
            self::assertInstanceOf(DateInterval::class, $connection->uptime);
            self::assertInstanceOf(DateInterval::class, $connection->idle);
            self::assertIsNumeric($connection->pendingBytes);
            self::assertIsNumeric($connection->messagesIn);
            self::assertIsNumeric($connection->messagesOut);
            self::assertIsNumeric($connection->bytesIn);
            self::assertIsNumeric($connection->bytesOut);
            self::assertIsNumeric($connection->subscriptionCount);
        }
    }
}
