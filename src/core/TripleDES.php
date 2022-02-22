<?php


namespace feixuelove\core;


class TripleDES
{
    static public function encrypt($data, $secret, $iv)
    {
        return base64_encode(openssl_encrypt($data, 'des-ede3-cbc', $secret, OPENSSL_RAW_DATA, $iv));
    }

    static public function decrypt($data, $secret, $iv)
    {
        return (openssl_decrypt(base64_decode($data), 'des-ede3-cbc', $secret, OPENSSL_RAW_DATA, $iv));
    }

}