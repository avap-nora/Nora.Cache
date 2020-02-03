<?php
namespace Nora\Cache\Provide;

use Cache\Adapter\Redis\RedisCachePool;
use Cache\Bridge\SimpleCache\SimpleCacheBridge;
use Cache\Prefixed\PrefixedCachePool;
use Nora\Architecture\DI\Dependency\ProviderInterface;
use Nora\Architecture\DI\Injector\InjectionPointInterface;
use Nora\Cache\RedisClientInterface;


class RedisCacheProvider implements ProviderInterface
{
    private $injectionPoint;
    private $redis;
    private $name;

    public function __construct(
        InjectionPointInterface $injectionPoint,
        RedisClientInterface $redis
    ) {
        $this->injectionPoint = $injectionPoint;
        $this->name = str_replace(
            '\\',
            '_',
            $injectionPoint->getClass()->name
        );
        $this->redis = $redis;
    }

    public function get()
    {
        return new SimpleCacheBridge(
            new PrefixedCachePool(
                new RedisCachePool($this->redis->connect()),
                "cache-".$this->name
            )
        );
    }
}
