<?php
namespace NoraCacheFake;

use Nora\Kernel\KernelInterface;
use Psr\SimpleCache\CacheInterface;

class Kernel implements KernelInterface
{
    public $cache;

    public function __construct(
        CacheInterface $cache
    ) {
        $this->cache = $cache;
    }
}
