<?php
declare(strict_types=1);

namespace Nora\Cache;

use PHPUnit\Framework\TestCase;

class CacheTest extends TestCase
{
    public function testIsTrue()
    {
        $this->assertInstanceOf(Cache::class, new Cache());
    }
}
