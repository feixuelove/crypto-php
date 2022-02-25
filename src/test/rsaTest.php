<?php

namespace feixuelove\crypto\test;

use feixuelove\core\RSA;

require "../core/RSA.php";

$data = "中文123@！#（）`_~|";

RSA::create();


$ciphertext = RSA::privEncrypt($data);

echo "encrypt:" . $ciphertext . PHP_EOL;

$plaintext = RSA::publicDecrypt($ciphertext);
echo "decrypt:" . $plaintext . PHP_EOL;