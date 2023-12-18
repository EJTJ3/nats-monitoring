<?php

declare(strict_types=1);

namespace Test\EJTJ3\NatsMonitoring\Intergration;

use Test\EJTJ3\NatsMonitoring\AbstractTestClient;
use Test\EJTJ3\NatsMonitoring\Constant;

final class TestHealtResponseTest extends AbstractTestClient
{
    public static function testHealtResponse(): void
    {
        $response = self::getClient()->getHealth(Constant::DEMO_SERVER);
        self::assertTrue($response->isOk());
    }
}
