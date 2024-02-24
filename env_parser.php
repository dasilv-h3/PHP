<?php
    function parseEnv($envFilePath): array
    {
        $envContent = file_get_contents($envFilePath);
        $envVariables = [];

        foreach (explode("\n", $envContent) as $line) {
            $line = trim($line);
            if (!empty($line) && strpos($line, '=') !== false) {
                list($key, $value) = explode('=', $line, 2);
                $envVariables[$key] = $value;
            }
        }
        return $envVariables;
    }