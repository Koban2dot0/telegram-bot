<?php

use Exception\EnvException;

class EnvHelper
{

    private const DEV = 'dev';

    private const PROD = 'prod';
    /**
     * @var string
     */
    public string $env;

    /**
     * @throws Exception
     */
    public function __construct()
    {
        $this->selectEnvToUse();
    }

    /**
     * @throws Exception
     */
    private function selectEnvToUse(): void
    {
        $prodEnv = __DIR__ . DIRECTORY_SEPARATOR . '../../' . '.env';
        $envToUse = $this->getEnvVar(
            'ENV',
            $prodEnv
        );
        if ($envToUse === self::PROD) {
            $this->env = $prodEnv;
        } elseif ($envToUse === self::DEV) {
            $this->env = __DIR__ . DIRECTORY_SEPARATOR . '../../' . '.env.local';
        } else {
            throw new EnvException(sprintf(EnvException::ENV_VARIABLE_NOT_EXISTS, 'ENV'));
        }
    }

    /**
     * @throws Exception
     */
    public function getEnvVar(string $key, string $envPath = null): string
    {
        if ($envPath === null) {
            $envPath = $this->env;
        }
        if (!str_contains($envPath, '.env')) {
            throw new EnvException(EnvException::ENV_FILE_NOT_EXISTS);
        }
        $fileDataArray = file($envPath);
        foreach ($fileDataArray as $envVariable) {
            $separateByEqualSign = explode('=', $envVariable);
            if ($separateByEqualSign[0] === $key) {
                unset($separateByEqualSign[0]);
                return trim(implode('=', $separateByEqualSign));
            }
        }
        throw new EnvException(sprintf(EnvException::ENV_VARIABLE_NOT_EXISTS, $key));
    }
}