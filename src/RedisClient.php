<?php
declare(strict_types=1);

namespace Nora\Cache;

use Redis;

/**
 * This Class Is A Part Of Nora\Cache
 */
class RedisClient implements RedisClientInterface
{
    private $host;
    private $port;
    private $timeout;
    private $reserved;
    private $retryInterval;
    private $readTimeout;

    public function __construct(
        $host,
        $port = 6379,
        $timeout = 0.0,
        $reserved = null,
        $retryInterval = 0,
        $readTimeout = 0.0
    ) {
        $this->host = $host;
        $this->port = $port;
        $this->timeout = $timeout;
        $this->reserved = $reserved;
        $this->retryInterval = $retryInterval;
        $this->readTimeout = $readTimeout;
    }

    public function connect()
    {
        $redis = new Redis();
        $redis->connect(
            $this->host,
            $this->port,
            $this->timeout,
            $this->reserved,
            $this->retryInterval,
            $this->readTimeout
        );
        return $redis;
    }
}
