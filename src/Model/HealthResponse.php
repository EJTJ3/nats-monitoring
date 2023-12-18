<?php

declare(strict_types=1);

namespace EJTJ3\NatsMonitoring\Model;

final class HealthResponse
{
    public function __construct(
        public string $status,
        public ?string $error = null,
    ) {
    }

    public function isOk(): bool
    {
        return $this->status === 'ok';
    }
}
