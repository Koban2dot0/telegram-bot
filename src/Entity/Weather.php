<?php

namespace Entity;

class Weather
{
    public ?string $skyStatus;

    public ?string $skyStatusDesc;

    public ?float $temperature;

    public ?float $tempFeelsLike;

    public ?string $humidity;

    public ?float $windSpeed;

    public function __construct(array $data)
    {
        $this->skyStatus = $data['weather'][0]['main'] ?? null;
        $this->skyStatusDesc = $data['weather'][0]['description'] ?? null;
        $this->temperature = $data['main']['temp'] ?? null;
        $this->tempFeelsLike = $data['main']['feels_like'] ?? null;
        $this->humidity = $data['main']['humidity'] ?? null;
        $this->windSpeed = $data['wind']['speed'] ?? null;
    }
}