<?php

namespace feixuelove\crypto\test;

require "../core/Discuz.php";

use feixuelove\core\Discuz;

$data = "中文123@！#（）`_~|";
$key  = md5("123");
$iv   = substr($key, 0, 16);

$encrypt_str = Discuz::authcode($data, "ENCODE", $key, 10);
echo "encrypt_str:" . $encrypt_str . PHP_EOL;
$decrypt_str = Discuz::authcode($encrypt_str, "DECODE", $key, 10);
echo "decrypt_str:" . $decrypt_str . PHP_EOL;
