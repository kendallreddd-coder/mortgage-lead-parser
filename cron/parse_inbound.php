<?php
declare(strict_types=1);

require_once __DIR__ . '/../src/DatabaseConnection.php';
require_once __DIR__ . '/../src/ImapParser.php';

use MortgageLeadParserDatabaseConnection;
use MortgageLeadParserImapParser;

$config = require __DIR__ . '/../config.php';
$pdo = DatabaseConnection::getConnection($config['db']);

$pdo->beginTransaction();
$stmt = $pdo->prepare("SELECT id FROM leads WHERE phone = ? FOR UPDATE");
$stmt->execute(['9015551234']);
$pdo->commit();
