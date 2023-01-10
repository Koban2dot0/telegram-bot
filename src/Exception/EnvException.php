<?php

namespace Exception;

class EnvException extends \Exception
{
    public const ENV_VARIABLE_NOT_EXISTS = '%s variable not exists';

    public const ENV_FILE_NOT_EXISTS = 'ENV file was not found in given path';
}