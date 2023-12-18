<?php

declare(strict_types=1);

namespace EJTJ3\NatsMonitoring\Model;

use JMS\Serializer\Annotation as Serializer;

final class SubscriptionResponse
{
    #[Serializer\SerializedName(name: 'num_subscriptions')]
    public int $subscriptionCount;

    #[Serializer\SerializedName(name: 'num_cache')]
    public int $cacheCount;

    #[Serializer\SerializedName(name: 'num_inserts')]
    public int $insertCount;

    #[Serializer\SerializedName(name: 'num_removes')]
    public int $removeCount;

    #[Serializer\SerializedName(name: 'num_matches')]
    public int $matchCount;

    #[Serializer\SerializedName(name: 'cache_hit_rate')]
    public float $cacheHitRate;

    #[Serializer\SerializedName(name: 'max_fanout')]
    public int $maxFanout;

    #[Serializer\SerializedName(name: 'avg_fanout')]
    public float $averageFanout;

    public function __construct(
        int $subscriptionCount,
        int $cacheCount,
        int $insertCount,
        int $removeCount,
        int $matchCount,
        float $cacheHitRate,
        int $maxFanout,
        float $averageFanout,
    ) {
        $this->subscriptionCount = $subscriptionCount;
        $this->cacheCount = $cacheCount;
        $this->insertCount = $insertCount;
        $this->removeCount = $removeCount;
        $this->matchCount = $matchCount;
        $this->cacheHitRate = $cacheHitRate;
        $this->maxFanout = $maxFanout;
        $this->averageFanout = $averageFanout;
    }
}
