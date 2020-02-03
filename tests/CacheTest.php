<?php
declare(strict_types=1);

namespace Nora\Cache;

use Cache\Adapter\Redis\RedisCachePool;
use Cache\Bridge\SimpleCache\SimpleCacheBridge;
use Cache\Prefixed\PrefixedCachePool;
use PHPUnit\Framework\TestCase;
use Nora\Kernel\Bootstrap;
use NoraCacheFake\Kernel;
use Redis;

class CacheTest extends TestCase
{
    /**
     * @test
     */
    public function モジュールの呼び出し()
    {
        $kernel = (new Bootstrap)('NoraCacheFake', 'app-test');
        $this->assertInstanceOf(Kernel::class, $kernel);
        return $kernel;
    }

    /**
     * @test
     */
    public function Redisを試す()
    {
        $redis = new Redis();
        $redis->connect(
            getenv('REDIS_HOST'),
            (int) getenv('REDIS_PORT')
        );
        $pool = new RedisCachePool($redis);
        $cache = new SimpleCacheBridge(
            new PrefixedCachePool($pool, 'prefix-')
        );

        $cache->set('aaa', 'bbb');
        $this->assertEquals('bbb', $cache->get('aaa'));
    }

    /**
     * @test
     */
    public function アダプターを使ってRedisを試す()
    {
        $kernel = (new Bootstrap)('NoraCacheFake', 'app-test');
        $kernel->cache->set('aaa', 'bbb');
        $this->assertEquals('bbb', $kernel->cache->get('aaa'));
    }
}
