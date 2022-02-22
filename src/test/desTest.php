<?php

namespace feixuelove\crypto\test;

use feixuelove\core\DES;

require "../core/DES.php";

$key = 'key123456';
$iv  = 'iv123456';

// DES CBC 加解密
$des = new DES($key, 'DES-CBC', DES::OUTPUT_BASE64, $iv);
echo $base64Sign = $des->encrypt('中文123@！#（）`_~|');
echo "\n";
echo $des->decrypt($base64Sign);
echo "\n";

// DES ECB 加解密
$des = new DES($key, 'DES-ECB', DES::OUTPUT_HEX);
echo $base64Sign = $des->encrypt('中文123@！#（）`_~|');
echo "\n";
echo $des->decrypt($base64Sign) . PHP_EOL;