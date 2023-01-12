<?php

class DatabaseHelper implements DatabaseHelperInterface
{

    /**
     * @throws Exception
     * @return string[]
     */
    public static function getCredentials(): array
    {
        $envHelper = new EnvHelper();
        return [
            'host'     => $envHelper->getEnvVar('DATABASE_HOST'),
            'port'     => $envHelper->getEnvVar('DATABASE_PORT'), // optional
            'user'     => $envHelper->getEnvVar('MYSQL_USER'),
            'password' => $envHelper->getEnvVar('MYSQL_PASSWORD'),
            'database' => $envHelper->getEnvVar('MYSQL_DATABASE'),
        ];
    }
}