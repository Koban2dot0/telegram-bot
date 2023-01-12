<?php

namespace Repository;


include_once __DIR__ . '/../Repository/AbstractRepository.php';

class ChatRepository extends AbstractRepository
{
    protected const TABLE_NAME = 'chat';


    private const USER_CHATS_RELATION_TABLE = 'user_chat';

    public function getUserChats(array $users): array
    {
        if (empty($users)) {
            return [];
        }
        $ids = [];
        foreach ($users as $user) {
            $ids[] = $user['id'];
        }

        $idsString = implode(', ', $ids);
        return $this->pdo->query(
            'SELECT * FROM ' . self::USER_CHATS_RELATION_TABLE . ' WHERE user_id IN (' . $idsString . ');'
        )
            ->fetchAll();
    }
}