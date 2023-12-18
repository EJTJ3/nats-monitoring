<?php

declare(strict_types=1);

namespace Test\EJTJ3\NatsMonitoring\Intergration;

use Test\EJTJ3\NatsMonitoring\AbstractTestClient;
use Test\EJTJ3\NatsMonitoring\Constant;

final class TestLeafnodeResponseTest extends AbstractTestClient
{
    public static function testResponse(): void
    {
        $client = self::getClient();

        $leafnodeResponse = $client->getLeafnodes(Constant::DEMO_SERVER);

        // @TODO leafnode response test now

        self::assertNotEmpty($leafnodeResponse->server);
        self::greaterThan($leafnodeResponse->leafnodeCount);
        self::assertSame(count($leafnodeResponse->leafnodes ?? []), $leafnodeResponse->leafnodeCount);

        foreach ($leafnodeResponse->leafnodes ?? [] as $leafnode) {
            self::assertNotEmpty($leafnode->account);
            self::assertNotEmpty($leafnode->name);
            self::assertGreaterThanOrEqual(0, $leafnode->port);
            self::assertGreaterThanOrEqual(0, $leafnode->bytesIn);
            self::assertGreaterThanOrEqual(0, $leafnode->bytesOut);
            self::assertNotEmpty($leafnode->ip);
            self::assertIsBool($leafnode->isSpoke);
            self::assertGreaterThanOrEqual(0, $leafnode->messagesIn);
            self::assertGreaterThanOrEqual(0, $leafnode->messagesOut);
            self::assertNotEmpty($leafnode->rtt);
            self::assertGreaterThanOrEqual(0, $leafnode->subscriptionCount);
        }
    }
}
