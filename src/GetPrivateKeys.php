<?php

namespace Naveksoft\Signature;

use Predis\Client;

class GetPrivateKeys
{
    public function getPublicKeys(array $config): array
    {
        $client = new Client($config);
        return $client->hgetall('public_keys');
    }

    public function getPrivateKeys(array $config): array
    {
        $client = new Client($config);
        return $client->hgetall('private_keys');
    }

    public function setKeys(array $config, string $key, string $publicKey, string $privateKey): void
    {
        $client = new Client($config);
        $client->hset('public_keys', $key, $publicKey);
        $client->hset('private_keys', $key, $privateKey);
    }
}