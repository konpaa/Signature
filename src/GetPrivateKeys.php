<?php

namespace Naveksoft\Signature;

use Redis;

class GetPrivateKeys
{
    public function getKeys(array $config, string $host, int $port): array
    {
        $redis = new Redis($config);
        $redis->connect($host, $port);
        return $redis->hGetAll('keys');
    }
}