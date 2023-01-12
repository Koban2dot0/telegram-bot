<?php

namespace Service;

interface WeatherApiInterface
{
    public function getWeatherByLatLon(string $lat, string $lon): array;
}