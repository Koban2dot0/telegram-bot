<?php

use Action\SendWeatherAction;

include 'vendor/autoload.php';
include 'src/Helper/EnvHelper.php';
include 'src/Exception/EnvException.php';
include 'src/Action/SendWeatherAction.php';
include 'src/Helper/TelegramHelper.php';
include 'src/Helper/DatabaseHelper.php';


$a = new SendWeatherAction();
$a->sendDailyWeather();

