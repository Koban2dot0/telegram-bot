<?php

include 'DatabaseHelperInterface.php';

class DatabaseHelper implements DatabaseHelperInterface
{

    public const WEATHER_ADDITIONAL_PARAMETER = 'weather';

    /**
     * @return string[]
     * @throws Exception
     */
    public static function getCredentials(): array
    {
        $envHelper = new EnvHelper();
        return [
            'host' => $envHelper->getEnvVar('DATABASE_HOST'),
            'port' => $envHelper->getEnvVar('DATABASE_PORT'), // optional
            'user' => $envHelper->getEnvVar('MYSQL_USER'),
            'password' => $envHelper->getEnvVar('MYSQL_PASSWORD'),
            'database' => $envHelper->getEnvVar('MYSQL_DATABASE'),
        ];
    }

    /**
     * @return string[]
     */
    public static function getUserAdditionalConfigParameters(): array
    {
        return [
            self::WEATHER_ADDITIONAL_PARAMETER
        ];
    }
}