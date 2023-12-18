<?php

declare(strict_types=1);

namespace Test\EJTJ3\NatsMonitoring\Intergration;

use DateTimeImmutable;
use Test\EJTJ3\NatsMonitoring\AbstractTestClient;
use Test\EJTJ3\NatsMonitoring\Constant;

final class TestAccountStatisticTest extends AbstractTestClient
{
    public function testAccountTest(): void
    {
        $response = self::getClient()->getAccountStats(Constant::DEMO_SERVER);

        self::assertNotEmpty($response->serverId);
        self::isUtcTimezone($response->now);
        self::assertInstanceOf(DateTimeImmutable::class, $response->now);
        self::assertGreaterThan(0, $response->accountStatistics);

        foreach ($response->accountStatistics as $accountStatistic) {
            self::assertNotEmpty($accountStatistic->account);
            self::assertIsNumeric($accountStatistic->connectionCount);
            self::assertIsNumeric($accountStatistic->leafnodeCount);
            self::assertIsNumeric($accountStatistic->totalConnectionCount);
            self::assertIsNumeric($accountStatistic->sentStatistics->messageCount);
            self::assertIsNumeric($accountStatistic->sentStatistics->byteCount);
            self::assertIsNumeric($accountStatistic->receivedStatistic->messageCount);
            self::assertIsNumeric($accountStatistic->receivedStatistic->byteCount);
            self::assertIsNumeric($accountStatistic->slowConsumerCount);
        }
    }
}
