<?php

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
    public function selectEnvToUse(): void
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
            throw new Exception('ENV variable was not set');
        }
    }

    /**
     * @throws Exception
     */
    public function getEnvVar(string $key, string $envPath = null): string
    {
        if (!str_contains($envPath, '.env')) {
            throw new Exception('ENV file was not provided');
        }
        $fileDataArray = file($envPath);
        foreach ($fileDataArray as $envVariable) {
            $separateByEqualSign = explode('=', $envVariable);
            if ($separateByEqualSign[0] === $key) {
                return trim($separateByEqualSign[1]);
            }
        }
        return '';
    }
}