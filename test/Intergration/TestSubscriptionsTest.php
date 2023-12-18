<?php

declare(strict_types=1);

namespace Test\EJTJ3\NatsMonitoring\Intergration;

use EJTJ3\NatsMonitoring\Model\SubscriptionResponse;
use Test\EJTJ3\NatsMonitoring\AbstractTestClient;
use Test\EJTJ3\NatsMonitoring\Constant;

final class TestSubscriptionsTest extends AbstractTestClient
{
    public static function testSubscriptions(): void
    {
        $response = self::getClient()->getSubscriptions(Constant::DEMO_SERVER);

        self::assertInstanceOf(SubscriptionResponse::class, $response);
        self::assertIsNumeric($response->subscriptionCount);
        self::assertIsNumeric($response->cacheCount);
        self::assertIsNumeric($response->insertCount);
        self::assertIsNumeric($response->removeCount);
        self::assertIsNumeric($response->cacheHitRate);
        self::assertIsNumeric($response->cacheCount);
        self::assertIsNumeric($response->averageFanout);
        self::assertIsNumeric($response->maxFanout);
    }
}
