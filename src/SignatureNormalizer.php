<?php

namespace Naveksoft\Signature;

class SignatureNormalizer
{
    public static function normalize(array $data): string
    {
        return json_encode(self::recursiveSort($data), JSON_UNESCAPED_UNICODE);
    }

    protected static function recursiveSort(array $data): array
    {
        foreach ($data as &$value) {
            if (is_array($value)) {
                $value = self::recursiveSort($value);
            }
        }
        ksort($data);
        return $data;
    }
}