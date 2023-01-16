<?php

namespace Service\Weather;

interface WeatherApiInterface
{
    public function getWeatherByLatLon(string $lat, string $lon): array;
}