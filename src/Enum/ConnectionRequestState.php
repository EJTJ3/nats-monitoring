<?php

declare(strict_types=1);

namespace EJTJ3\NatsMonitoring\Enum;

enum ConnectionRequestState: string
{
    case OPEN = 'open';
    case CLOSED = 'closed';
    case ANY = 'any';
}
