<?php

declare(strict_types=1);

namespace EJTJ3\NatsMonitoring;

use Http\Discovery\Psr17Factory;
use Psr\Http\Message\RequestFactoryInterface;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\StreamFactoryInterface;
use Psr\Http\Message\StreamInterface;

final class RequestBuilder
{
    public function __construct(
        private readonly RequestFactoryInterface $requestFactory = new Psr17Factory(),
        private readonly StreamFactoryInterface $streamFactory = new Psr17Factory()
    ) {
    }

    /**
     * @param array<string, bool|int|string|null> $query
     */
    public function buildRequest(
        string $method,
        string $url,
        array $query = [],
        StreamInterface|string $body = null
    ): RequestInterface {
        if (count($query) !== 0) {
            $url .= '?' . http_build_query($query);
        }

        $request = $this->requestFactory->createRequest($method, $url);

        if ($body !== null) {
            if (!$body instanceof StreamInterface) {
                $body = $this->streamFactory->createStream($body);
            }

            $request = $request->withBody($body);
        }

        return $request;
    }
}
