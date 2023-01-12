<?php

namespace Repository;


include_once __DIR__ . '/../Repository/AbstractRepository.php';

class UserRepository extends AbstractRepository
{

    protected const TABLE_NAME = 'user';

    private const USER_CHATS_RELATION_TABLE = 'user_chat';

    public function getUsersWithWeatherMailing(): array
    {
        $users = $this->pdo->query(
            'SELECT * FROM ' . self::TABLE_NAME . ' WHERE additional_config_parameters IS NOT NULL;'
        )
            ->fetchAll();

        $result = [];

        foreach ($users as $user) {
            $params = json_decode($user['additional_config_parameters'], true);

            if (isset($params['weather'])) {
                $result[] = $user;
            }
        }

        return $result;
    }
}