<?php

declare(strict_types=1);

namespace EJTJ3\NatsMonitoring\Enum;

enum ConnectionRequestSort: string
{
    /**
     * Sort by connection ID.
     */
    case CID = 'cid';

    /**
     * Sort by connection start time, same as CID.
     */
    case START = 'start';

    /**
     * Sort by number of subscriptions.
     */
    case SUBS = 'subs';

    /**
     * Sort by amount of data in bytes waiting to be sent to client.
     */
    case PENDING = 'pending';

    /**
     * Sort bynumber of messages sent.
     */
    case MSG_SENT = 'msgs_to';

    /**
     * Sort by Number of messages received.
     */
    case MSG_REC = 'msgs_from';

    /**
     * Sort by: number of bytes sent.
     */
    case BYTES_SENT = 'bytes_to';

    /**
     * sort by Number of bytes received.
     */
    case BYTES_REC = 'bytes_from';

    /**
     * Sort by Lifetime of the connection.
     */
    case UPTIME = 'uptime';

    /**
     * Sort by Last activity.
     */
    case LAST = 'last';

    /**
     * Sort by Amount of inactivity.
     */
    case IDLE = 'idle';

    /**
     * Sort by: Stop time for a closed connection.
     */
    case STOP_TIME = 'stop';

    /**
     * Sort by: reason for a closed connection.
     */
    case REASON = 'reason';

    /**
     * Sort by Round trip time.
     */
    case RTT = 'rtt';
}
