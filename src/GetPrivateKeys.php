<?php

namespace Naveksoft\Signature;

use Predis\Client;

class GetPrivateKeys
{
    public function getKeys(array $config): array
    {
        $client = new Client($config);
        return $client->hgetall('keys');
    }

    public function setKeys(array $config, string $key, string $value): void
    {
        $client = new Client($config);
        $client->hset('keys', $key, $value);
    }
}