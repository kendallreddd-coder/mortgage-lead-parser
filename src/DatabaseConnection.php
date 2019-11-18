<?php
declare(strict_types=1);

namespace MortgageLeadParser;

use PDO;

class DatabaseConnection {
    private static ?PDO $instance = null;

    public static function getConnection(array $config): PDO {
        if (self::$instance === null) {
            $dsn = "mysql:host={$config['host']};dbname={$config['name']};charset=utf8mb4";
            self::$instance = new PDO($dsn, $config['user'], $config['pass'], [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
            ]);
        }
        return self::$instance;
    }
}
