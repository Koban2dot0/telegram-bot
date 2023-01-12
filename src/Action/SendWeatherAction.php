<?php

namespace Action;

use Exception;
use Longman\TelegramBot\DB;
use Longman\TelegramBot\Exception\TelegramException;
use Longman\TelegramBot\Request;
use TelegramHelper;

class SendWeatherAction
{

    /**
     * @throws TelegramException
     * @throws Exception
     */
    public function sendDailyWeather(): bool
    {

        if (!DB::isDbConnected()) {
            (new TelegramHelper())->configureBaseTelegramMysqlConnection();
        }

        $pdo = DB::getPdo();

        /** TODO: retrieve chat_id from database */


        /** TODO: add weather API and format message sending */
        $result = Request::sendMessage([
            'chat_id' => $chat_id,
            'text'    => 'Your utf8 text 😜 ...',
        ]);

        /** TODO: create user command and configure cron */
    }
}