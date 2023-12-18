<?php

declare(strict_types=1);

namespace Test\EJTJ3\NatsMonitoring\Intergration;

use Test\EJTJ3\NatsMonitoring\AbstractTestClient;
use Test\EJTJ3\NatsMonitoring\Constant;

final class TestAccountTest extends AbstractTestClient
{
    public function testAccount(): void
    {
        $response = self::getClient()->getAccounts(Constant::DEMO_SERVER);

        self::assertNotEmpty($response->serverId);
        // @TODO add datetime now check

        self::assertNotEmpty($response->systemAccount);
        self::assertNotEmpty($response->accounts);

        foreach ($response->accounts as $account) {
            self::assertIsString($account);
            self::assertNotEmpty($account);
        }
    }
}
