<?php

declare(strict_types=1);

namespace Test\EJTJ3\NatsMonitoring\Intergration;

use Test\EJTJ3\NatsMonitoring\AbstractTestClient;
use Test\EJTJ3\NatsMonitoring\Constant;

final class TestJetstreamResponseTest extends AbstractTestClient
{
    public static function test(): void
    {
        $response = self::getClient()->getJetstream(Constant::DEMO_SERVER);

        self::assertNotEmpty($response->server);
        self::assertIsNumeric($response->config->maxMemory);
        self::assertIsNumeric($response->config->maxStorage);
        self::assertSame('/var/jetstream/jetstream', $response->config->storeDir);
        self::assertTrue($response->config->compressOk);
        self::assertIsNumeric($response->memory);
        self::assertIsNumeric($response->storage);
        self::assertIsNumeric($response->reservedMemory);
        self::assertIsNumeric($response->reservedStorage);
        self::assertIsNumeric($response->accountCount);
        self::assertIsNumeric($response->haAssets);
        self::assertIsNumeric($response->jetstreamApi->errorCount);
        self::assertIsNumeric($response->jetstreamApi->totalCount);
        self::assertIsNumeric($response->streamCount);
        self::assertIsNumeric($response->consumerCount);
        self::assertIsNumeric($response->messageCount);
        self::assertIsNumeric($response->byteCount);
    }
}
