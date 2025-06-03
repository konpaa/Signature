<?php

namespace Naveksoft\Signature;

class ValidationSignature
{
    public static function generate(array $data, array $rules, string $privateKey): string
    {
        $normalizedData = SignatureNormalizer::normalize($data);
        $normalizedRules = SignatureNormalizer::normalize($rules);

        $message = "$normalizedData||$normalizedRules";

        $signature = sodium_crypto_sign_detached($message, $privateKey);

        return base64_encode($signature);
    }

    public static function verify(array $data, array $rules, string $signature, string $publicKey): bool
    {
        $normalizedData = SignatureNormalizer::normalize($data);
        $normalizedRules = SignatureNormalizer::normalize($rules);

        $message = "$normalizedData||$normalizedRules";

        return sodium_crypto_sign_verify_detached(base64_decode($signature), $message, $publicKey);
    }
}