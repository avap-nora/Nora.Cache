<?php
namespace Nora\Cache\Module;

use Nora\Cache\Provide\RedisCacheProvider;
use Nora\Cache\RedisClient;
use Nora\Cache\RedisClientInterface;
use Nora\Framework\Kernel\AbstractKernelConfigurator;
use Psr\SimpleCache\CacheInterface;
use Redis;

class CacheModule extends AbstractConfigurator
{
    public function configure()
    {
        // Redisをセットする
        $this->bind(RedisClientInterface::class)
            ->toConstructor(
                RedisClient::class,
                'host=redis_host,port=redis_port'
            );
        $this->bind()
            ->annotatedWith('redis_host')
            ->toInstance(getenv('REDIS_HOST'));
        $this->bind()
            ->annotatedWith('redis_port')
            ->toInstance((int) getenv('REDIS_PORT'));
        $this
            ->bind(CacheInterface::class)
            ->toProvider(RedisCacheProvider::class);
    }
}

