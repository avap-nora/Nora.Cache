<?php
namespace NoraCacheFake\Context;

use Nora\Cache\Module\CacheModule;
use Nora\Cache\Provide\RedisCacheProvider;
use Nora\Cache\RedisClient;
use Nora\Cache\RedisClientInterface;
use Nora\Kernel\AbstractKernelModule;
use Psr\SimpleCache\CacheInterface;
use Redis;

class TestModule extends AbstractKernelModule
{
    public function configure()
    {
        // Cacheをセットする
        $this->install(new CacheModule());
    }
}

