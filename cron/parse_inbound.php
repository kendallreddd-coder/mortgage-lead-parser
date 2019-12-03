<?php
declare(strict_types=1);

require_once __DIR__ . '/../src/DatabaseConnection.php';
require_once __DIR__ . '/../src/ImapParser.php';

use MortgageLeadParserDatabaseConnection;
use MortgageLeadParserImapParser;

echo "[CRON] Lead parser daemon started\n";
