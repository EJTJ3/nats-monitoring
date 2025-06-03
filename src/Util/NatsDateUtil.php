<?php

declare(strict_types=1);

namespace EJTJ3\NatsMonitoring\Util;

use DateInterval;
use Exception;

final readonly class NatsDateUtil
{
    /**
     *
     * @throws Exception
     */
    public static function createDateInterval(string $interval): DateInterval
    {
        $interval = str_replace('D', 'DT', strtoupper($interval));

        if (!str_contains($interval, 'T')) {
            $interval = 'T' . $interval;
        }

        return new DateInterval('P' . $interval);
    }
}
