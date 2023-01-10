#!/usr/bin/env php
<?php

/**
 * This file is part of the PHP Telegram Bot example-bot package.
 * https://github.com/php-telegram-bot/example-bot/
 *
 * (c) PHP Telegram Bot Team
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

/**
 * This file is used to run the bot with the getUpdates method.
 */

// Load composer
require_once __DIR__ . '/vendor/autoload.php';
require_once __DIR__ . '/src/Helper/EnvHelper.php';


try {
    // object to get data from configuration file
    $envHelper = new EnvHelper();
    // Create Telegram API object
    $telegram = new Longman\TelegramBot\Telegram(
        $envHelper->getEnvVar('BOT_TOKEN'),
        $envHelper->getEnvVar('BOT_USERNAME'),
    );

    $telegram->useGetUpdatesWithoutDatabase();

    // Handle telegram getUpdates request
    $server_response = $telegram->handleGetUpdates();
    var_dump($server_response);
    if ($server_response->isOk()) {
        $update_count = count($server_response->getResult());
        echo date('Y-m-d H:i:s') . ' - Processed ' . $update_count . ' updates';
    } else {
        echo date('Y-m-d H:i:s') . ' - Failed to fetch updates' . PHP_EOL;
        echo $server_response->printError();
    }

} catch (Longman\TelegramBot\Exception\TelegramLogException $e) {
    // Uncomment this to output log initialisation errors (ONLY FOR DEVELOPMENT!)
    // e
} catch (Longman\TelegramBot\Exception\TelegramException $e) {
    // Log telegram errors
    Longman\TelegramBot\TelegramLog::error($e);

    // Uncomment this to output any errors (ONLY FOR DEVELOPMENT!)
    // echo $e;
} catch (Exception $e) {
}