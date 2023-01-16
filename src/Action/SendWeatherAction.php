#!/usr/bin/env php
<?php

namespace Action;

use Entity\Weather;
use Exception;
use GuzzleHttp\Exception\GuzzleException;
use Longman\TelegramBot\DB;
use Longman\TelegramBot\Exception\TelegramException;
use Longman\TelegramBot\Request;
use Repository\ChatRepository;
use Repository\UserRepository;
use Service\Weather\OpenWeatherApiService;
use Service\Weather\WeatherApiInterface;
use Service\WeatherTextFormatterService;
use TelegramHelper;

include_once __DIR__ . '/../Repository/UserRepository.php';
include_once __DIR__ . '/../Repository/ChatRepository.php';
include_once __DIR__ . '/../Service/Weather/OpenWeatherApiService.php';
include_once __DIR__ . '/../Service/WeatherTextFormatterService.php';
include_once __DIR__ . '/../Entity/Weather.php';

class SendWeatherAction
{

    private UserRepository $userRepository;
    private ChatRepository $chatRepository;
    private WeatherApiInterface $weatherApiService;

    public function __construct()
    {
        $this->userRepository = new UserRepository();
        $this->chatRepository = new ChatRepository();
        $this->weatherApiService = new OpenWeatherApiService();
    }


    /**
     * @throws TelegramException
     * @throws Exception
     * @throws GuzzleException
     */
    public function sendDailyWeather(): bool
    {

        if (!DB::isDbConnected()) {
            (new TelegramHelper())->configureBaseTelegramMysqlConnection();
        }

        $users = $this->userRepository->getUsersSubscribedToWeatherMailing();
        $chats = $this->chatRepository->getUserChats($users);


        $data = $this->weatherApiService->getWeatherByLatLon('46.42842529996223', '30.71384692214876');
        $weather = new Weather($data);

        foreach ($chats as $chat) {
            Request::sendMessage([
                'chat_id' => $chat['chat_id'],
                'text'    => WeatherTextFormatterService::getText($weather),
            ]);
        }

        return true;

        /** TODO: create user command and configure cron */
    }
}