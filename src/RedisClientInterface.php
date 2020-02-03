<?php
declare(strict_types=1);

namespace Nora\Cache;

/**
 * This Class Is A Part Of Nora\Cache
 */
interface RedisClientInterface
{
    public function __construct(
        $host,
        $port = 6379,
        $timeout = 0.0,
        $reserved = null,
        $retryInterval = 0,
        $readTimeout = 0.0
    );
}
