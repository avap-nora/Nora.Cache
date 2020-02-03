<?php
namespace NoraCacheFake\Kernel\Context;

use Nora\Cache\Module\CacheModule;
use Nora\Cache\Provide\RedisCacheProvider;
use Nora\Cache\RedisClient;
use Nora\Cache\RedisClientInterface;
use Nora\Framework\Kernel\AbstractKernelConfigurator;
use Psr\SimpleCache\CacheInterface;
use Redis;

class TestConfigurator extends AbstractKernelConfigurator
{
    public function configure()
    {
        // Cacheをセットする
        $this->install(new CacheModule());
    }
}

