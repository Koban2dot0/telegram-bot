<?php

namespace Repository;

use Longman\TelegramBot\DB;
use Longman\TelegramBot\Exception\TelegramException;
use PDO;
use TelegramHelper;

abstract class AbstractRepository
{
    protected const TABLE_NAME = 'user';

    protected ?PDO $pdo;

    /**
     * @throws TelegramException
     */
    public function __construct()
    {
        (new TelegramHelper())->configureBaseTelegramMysqlConnection();
        $this->pdo = DB::getPdo();
    }
}