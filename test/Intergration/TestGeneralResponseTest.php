<?php

declare(strict_types=1);

namespace Test\EJTJ3\NatsMonitoring\Intergration;

use DateInterval;
use DateTimeImmutable;
use Test\EJTJ3\NatsMonitoring\AbstractTestClient;
use Test\EJTJ3\NatsMonitoring\Constant;

final class TestGeneralResponseTest extends AbstractTestClient
{
    public function testGeneralResponse(): void
    {
        $response = self::getClient()->getGeneralSettings(Constant::DEMO_SERVER);

        self::assertNotEmpty($response->serverId);
        self::assertNotEmpty($response->serverName);
        self::assertNotEmpty($response->version);
        self::assertIsNumeric($response->proto);
        self::assertNotEmpty($response->gitCommit);
        self::assertNotEmpty($response->goVersion);
        self::assertNotEmpty($response->host);
        self::assertIsNumeric($response->port);
        self::assertNotNull($response->authRequired);
        self::assertIsNumeric($response->maxConnections);
        self::assertIsNumeric($response->pingInterval);
        self::assertIsNumeric($response->maxPing);
        self::assertNotEmpty($response->httpHost);
        self::assertIsNumeric($response->port);
        self::assertNotNull($response->httpBasePath);
        self::assertIsNumeric($response->httpsPort);
        self::assertIsNumeric($response->authTimeout);
        self::assertIsNumeric($response->maxControlLine);
        self::assertIsNumeric($response->maxPayload);
        self::assertIsNumeric($response->maxPending);
        self::assertIsNumeric($response->tlsTimeout);
        self::assertIsNumeric($response->writeDeadline);
        self::assertInstanceOf(DateTimeImmutable::class, $response->start);
        self::isUtcTimezone($response->start);
        self::assertInstanceOf(DateTimeImmutable::class, $response->now);
        self::isUtcTimezone($response->now);
        self::assertInstanceOf(DateInterval::class, $response->uptime);
        self::assertIsNumeric($response->memory);
        self::assertIsNumeric($response->coreCount);
        self::assertIsNumeric($response->golangMaxProcesses);
        self::assertIsNumeric($response->cpu);
        self::assertIsNumeric($response->maxSubscriptionCount);
        self::assertIsNumeric($response->totalConnections);
        self::assertIsNumeric($response->routeCount);
        self::assertIsNumeric($response->leafnodeCount);
        self::assertIsNumeric($response->messagesIn);
        self::assertIsNumeric($response->messagesOut);
        self::assertIsNumeric($response->bytesIn);
        self::assertIsNumeric($response->bytesOut);
        self::assertIsNumeric($response->slowConsumerCount);
        self::assertIsNumeric($response->subscriptionCount);
        self::assertInstanceOf(DateTimeImmutable::class, $response->configLoadTime);
        self::assertNotEmpty($response->system_account);
    }
}
