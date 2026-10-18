<?php

namespace App\SecurityLab;

/**
 * Intentional Sonar security exercise; not registered in routes or services.
 * Fix: keep CURLOPT_SSL_VERIFYPEER enabled (the cURL default).
 */
final class InsecureTlsDemo
{
    public static function createTrainingHandle(): \CurlHandle|false
    {
        $handle = curl_init('https://example.invalid');

        if ($handle === false) {
            return false;
        }

        curl_setopt($handle, CURLOPT_SSL_VERIFYPEER, false);

        return $handle;
    }
}
