<?php

namespace Service\Logger;

use Psr\Log\LoggerInterface;
use Stringable;

class FileLogger implements LoggerInterface
{

    public function emergency(Stringable|string $message, array $context = []): void
    {
        $this->log();
    }

    public function alert(Stringable|string $message, array $context = []): void
    {
        // TODO: Implement alert() method.
    }

    public function critical(Stringable|string $message, array $context = []): void
    {
        // TODO: Implement critical() method.
    }

    public function error(Stringable|string $message, array $context = []): void
    {
        // TODO: Implement error() method.
    }

    public function warning(Stringable|string $message, array $context = []): void
    {
        // TODO: Implement warning() method.
    }

    public function notice(Stringable|string $message, array $context = []): void
    {
        // TODO: Implement notice() method.
    }

    public function info(Stringable|string $message, array $context = []): void
    {
        // TODO: Implement info() method.
    }

    public function debug(Stringable|string $message, array $context = []): void
    {
        // TODO: Implement debug() method.
    }

    public function log($level, Stringable|string $message, array $context = []): void
    {

    }
}