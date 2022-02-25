<?php


namespace feixuelove\core;

class RSA
{
    const config = [
        'digest_alg'       => 'sha256',
        'private_key_bits' => 2048,
        'private_key_type' => \OPENSSL_KEYTYPE_RSA,
    ];
    const key_path = "/../test/";

    /**
     * set private key.
     * @param null $private_key
     * @return bool
     */
    static private function privateKey($private_key = null)
    {
        $key_path = dirname(__FILE__) . self::key_path . "rsa_private_key.pem";
        if (is_file($key_path)) {
            return false;
        }
        if ($fileRes = fopen($key_path, "w+")) {
            if (!fwrite($fileRes, $private_key)) {
                fclose($fileRes);
                return true;
            }
        }
        fclose($fileRes);
        return false;
    }

    /**
     * set public key.
     * @param null $public_key
     * @return bool
     */
    static private function publicKey($public_key = null)
    {
        $key_path = dirname(__FILE__) . self::key_path . "rsa_public_key.pem";
        if (is_file($key_path)) {
            return false;
        }
        if ($fileRes = fopen($key_path, "w+")) {
            if (!fwrite($fileRes, $public_key)) {
                fclose($fileRes);
                return true;
            }
        }
        fclose($fileRes);
        return false;

    }

    /**
     * @return false|resource
     */
    private static function getPrivateKey()
    {
        $abs_path = dirname(__FILE__) . self::key_path . "rsa_private_key.pem";
        $content  = file_get_contents($abs_path);
        return openssl_pkey_get_private($content);
    }

    /**
     * @return false|resource
     */
    private static function getPublicKey()
    {
        $abs_path = dirname(__FILE__) . self::key_path . "rsa_public_key.pem";
        $content  = file_get_contents($abs_path);
        return openssl_pkey_get_public($content);
    }


    /**
     * create a pair of private&public key.
     */
    static public function create($config = [])
    {
        $config = array_merge(self::config, $config);
        $res    = openssl_pkey_new($config);
        openssl_pkey_export($res, $pri_key);
        self::privateKey($pri_key);
        $res = openssl_pkey_get_details($res);
        self::publicKey($res['key']);
    }

    /**
     * 私钥加密
     * @param string $data
     * @return null|string
     */
    public static function privEncrypt($data = '')
    {
        if (!is_string($data)) {
            return null;
        }
        return openssl_private_encrypt($data, $encrypted, self::getPrivateKey()) ? base64_encode($encrypted) : null;
    }

    /**
     * 公钥加密
     * @param string $data
     * @return null|string
     */
    public static function publicEncrypt($data = '')
    {
        if (!is_string($data)) {
            return null;
        }
        return openssl_public_encrypt($data, $encrypted, self::getPublicKey()) ? base64_encode($encrypted) : null;
    }

    /**
     * 私钥解密
     * @param string $encrypted
     * @return null
     */
    public static function privDecrypt($encrypted = '')
    {
        if (!is_string($encrypted)) {
            return null;
        }
        return (openssl_private_decrypt(base64_decode($encrypted), $decrypted, self::getPrivateKey())) ? $decrypted : null;
    }

    /**
     * 公钥解密
     * @param string $encrypted
     * @return null
     */
    public static function publicDecrypt($encrypted = '')
    {
        if (!is_string($encrypted)) {
            return null;
        }
        return (openssl_public_decrypt(base64_decode($encrypted), $decrypted, self::getPublicKey())) ? $decrypted : null;
    }

}