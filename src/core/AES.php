<?php

namespace feixuelove\core;

class AES
{
    /**
     * AES 加密
     * @param array $data 带转换报文
     * @param string $key 加密key
     * @param string $iv 偏移量
     * @param string $method 方法
     * @return string
     */
    static public function opensslEncrypt($data, $key, $iv, $method = "AES-256-CBC")
    {
        if (strlen($iv) != openssl_cipher_iv_length($method)) {
            return "iv length is error!";
        }
        $str = openssl_encrypt(json_encode($data), $method, $key, OPENSSL_RAW_DATA, $iv);
        return base64_encode($str);
    }

    /**
     * @param $encrypt
     * @param $key
     * @param string $iv
     * @param string $method
     * @return mixed
     */
    static public function opensslDecrypt($encrypt, $key, $iv = '', $method = "AES-256-CBC")
    {
        if (strlen($iv) != openssl_cipher_iv_length($method)) {
            return "iv length is error!";
        }

        $str = openssl_decrypt(base64_decode($encrypt), $method, $key, OPENSSL_RAW_DATA, $iv);
        return json_decode($str, true);
    }


}