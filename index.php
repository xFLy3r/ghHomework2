<?php

require __DIR__ . '/vendor/autoload.php';


use Gregwar\Captcha\CaptchaBuilder;
use Respect\Validation\Validator as v;

$builder = new CaptchaBuilder;
$number = 123 . 's';
echo v::numeric()->validate($number);


