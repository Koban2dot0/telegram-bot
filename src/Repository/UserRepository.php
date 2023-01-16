<?php

namespace Repository;


use DatabaseHelper;

include_once __DIR__ . '/../Repository/AbstractRepository.php';
include_once __DIR__ . '/../Helper/DatabaseHelper.php';

class UserRepository extends AbstractRepository
{

    protected const TABLE_NAME = 'user';

    private const USER_CHATS_RELATION_TABLE = 'user_chat';

    public function getUsersSubscribedToWeatherMailing(): array
    {
        $users = $this->pdo->query(
            'SELECT * FROM ' . self::TABLE_NAME . ' WHERE additional_config_parameters IS NOT NULL;'
        )
            ->fetchAll();

        $result = [];

        foreach ($users as $user) {
            $params = json_decode($user['additional_config_parameters'], true);

            if (isset($params[DatabaseHelper::WEATHER_ADDITIONAL_PARAMETER])) {
                $result[] = $user;
            }
        }

        return $result;
    }
}