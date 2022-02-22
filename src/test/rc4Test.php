<?php

namespace feixuelove\crypto\test;

use feixuelove\core\RC4;

require "../core/RC4.php";

$data        = "中文123@！#（）`_~|";
$key         = md5("123");
$str         = RC4::encrypt($data, $key);
$encrypt_str = (base64_encode($str));
echo "encrypt_str:" . $encrypt_str . PHP_EOL;
$decrypt_str = RC4::encrypt(base64_decode($encrypt_str), $key);
echo "decrypt_str:" . $decrypt_str . PHP_EOL;

