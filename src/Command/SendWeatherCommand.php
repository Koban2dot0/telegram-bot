<?php

use Action\SendWeatherAction;
use GuzzleHttp\Exception\GuzzleException;
use Longman\TelegramBot\Exception\TelegramException;

include_once __DIR__ . '/../Action/SendWeatherAction.php';

$sendWeatherAction = new SendWeatherAction();
try {
    $sendWeatherAction->sendDailyWeather();
} catch (GuzzleException|TelegramException|Exception $e) {

}