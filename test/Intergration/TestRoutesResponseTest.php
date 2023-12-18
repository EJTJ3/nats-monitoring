<?php

declare(strict_types=1);

namespace Test\EJTJ3\NatsMonitoring\Intergration;

use Test\EJTJ3\NatsMonitoring\AbstractTestClient;
use Test\EJTJ3\NatsMonitoring\Constant;
use DateTimeImmutable;
use DateInterval;

final class TestRoutesResponseTest extends AbstractTestClient
{
    public function testRoutes(): void
    {
        $response = self::getClient()->getRoutez(Constant::DEMO_SERVER);

        self::assertNotEmpty($response->serverName);
        self::assertNotEmpty($response->serverId);
        self::assertSame(count($response->routes), $response->routesCount);

        foreach ($response->routes as $route) {
            self::assertIsNumeric($route->rid);
            self::assertNotEmpty($route->remoteId);
            self::assertNotEmpty($route->remoteName);
            self::assertNotNull($route->didSolicit);
            self::assertNotNull($route->isConfigured);
            self::assertNotEmpty($route->ip);
            self::assertIsNumeric($route->port);
            self::assertSame('UTC', $route->start->getTimezone()->getName());
            self::assertInstanceOf(DateTimeImmutable::class, $route->start);
            self::assertInstanceOf(DateTimeImmutable::class, $route->lastActivity);
            self::assertSame('UTC', $route->lastActivity->getTimezone()->getName());
            self::assertInstanceOf(DateInterval::class, $route->uptime);
            self::assertNotEmpty($route->rtt);
            self::assertGreaterThanOrEqual(0, $route->pendingSize);
            self::assertIsNumeric($route->pendingSize);
            self::assertGreaterThanOrEqual(0, $route->messagesIn);
            self::assertIsNumeric($route->messagesIn);
            self::assertGreaterThanOrEqual(0, $route->messagesOut);
            self::assertIsNumeric($route->messagesOut);
            self::assertGreaterThanOrEqual(0, $route->bytesIn);
            self::assertIsNumeric($route->bytesIn);
            self::assertGreaterThanOrEqual(0, $route->bytesOut);
            self::assertIsNumeric($route->bytesOut);
            self::assertGreaterThanOrEqual(0, $route->subscriptionCount);
            self::assertIsNumeric($route->subscriptionCount);
        }
    }
}
