<?php

namespace feixuelove\crypto\test;

use feixuelove\core\AES;

require "../core/Aes.php";

$data = "中文123@！#（）`_~|";
$key  = md5("123");
$iv   = substr($key, 0, 16);

$encrypt_str = AES::opensslEncrypt($data, $key, $iv);

echo "encrypt_str:" . $encrypt_str . PHP_EOL;

$decrypt_str = AES::opensslDecrypt($encrypt_str, $key, $iv);

echo "decrypt_str:" . $decrypt_str . PHP_EOL;