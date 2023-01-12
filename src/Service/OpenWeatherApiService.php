<?php

namespace Service;

use EnvHelper;
use Exception;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;

include_once __DIR__ . '/../Helper/EnvHelper.php';
include_once __DIR__ . '/WeatherApiInterface.php';

class OpenWeatherApiService implements WeatherApiInterface
{

    private const WEATHER_URI = '/weather/';
    private EnvHelper $envHelper;

    public function __construct()
    {
        $this->envHelper = new EnvHelper();
    }

    /**
     * @throws Exception
     * @throws GuzzleException
     */
    public function getWeatherByLatLon(string $lat, string $lon): array
    {
        $httpClient = new Client();
        $uri = http_build_query([
            'lat' => $lat,
            'lon' => $lon,
            'units' => 'metric',
            'appid' => $this->envHelper->getEnvVar('OPEN_WEATHER_API_KEY')
        ]);

        $response = $httpClient->request(
            'GET',
            $this->envHelper->getEnvVar('OPEN_API_WEATHER_URL') . self::WEATHER_URI . '?' . $uri,
        );
        return json_decode($response->getBody(), true);
    }

}