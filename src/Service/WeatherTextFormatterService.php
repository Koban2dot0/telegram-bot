<?php

namespace Service;

use Entity\Weather;

include_once __DIR__  . '/../Entity/Weather.php';
class WeatherTextFormatterService
{
    public static function getText(Weather $weather): string
    {
        $text = "⛅Sky: $weather->skyStatus \n" .
                 "📖Description: $weather->skyStatusDesc \n";
        if ($weather->temperature <= 1) {
            $text .= '🥶';
        }  else {
            $text .= '🥵';
        }

        $text .= "Temperature: $weather->temperature ℃\n";

        if ($weather->tempFeelsLike <= 1) {
            $text .= '🥶';
        } else {
            $text .= '🥵';
        }

        $text .=
            "Temperature feels like: $weather->tempFeelsLike ℃\n" .
            "💦Humidity: $weather->humidity% \n" .
            "🌬	Wind speed: $weather->windSpeed \n";
        return $text;
    }
}