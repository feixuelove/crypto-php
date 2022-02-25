<?php

namespace feixuelove\crypto\test;

use feixuelove\core\AES;

require "../core/Aes.php";

$data = "中文123@！#（）`_~|";
$key  = md5("123");
$iv   = substr($key, 0, 16);

$ciphertext = AES::opensslEncrypt($data, $key, $iv);

echo "encrypt:" . $ciphertext . PHP_EOL;

$plaintext = AES::opensslDecrypt($ciphertext, $key, $iv);

echo "decrypt:" . $plaintext . PHP_EOL;