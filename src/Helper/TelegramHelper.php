<?php

use Longman\TelegramBot\Exception\TelegramException;
use Longman\TelegramBot\Telegram;

class TelegramHelper
{
    /**
     * @return Telegram
     * @throws Exception
     * @throws TelegramException
     */
    public function configureBaseTelegramMysqlConnection(): Telegram
    {
        // object to get data from configuration file
        $envHelper = new EnvHelper();
        // Create Telegram API object
        $telegram = new Longman\TelegramBot\Telegram(
            $envHelper->getEnvVar('BOT_TOKEN'),
            $envHelper->getEnvVar('BOT_USERNAME'),
        );

        $credentials = DatabaseHelper::getCredentials();

        // Enable MySQL
        $telegram->enableMySql($credentials);

        return $telegram;
    }
}