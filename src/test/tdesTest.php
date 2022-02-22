<?php

namespace feixuelove\crypto\test;

use feixuelove\core\TripleDES;

require "../core/TripleDES.php";

$data = "中文123@！#（）`_~|";
$key  = md5("123");
$iv   = substr($key, 0, openssl_cipher_iv_length('des-ede3-cbc'));
$encrypt_str         = TripleDES::encrypt($data, $key, $iv);
echo "encrypt_str:" . $encrypt_str . PHP_EOL;
$decrypt_str = TripleDES::decrypt($encrypt_str, $key, $iv);
echo "decrypt_str:" . $decrypt_str . PHP_EOL;
