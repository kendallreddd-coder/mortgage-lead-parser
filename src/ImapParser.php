<?php
declare(strict_types=1);

namespace MortgageLeadParser;

class ImapParser {
    public static function parseBody(string $rawBody, string $source): array {
        $lead = ['first_name' => '', 'last_name' => '', 'phone' => '', 'email' => '', 'loan_amount' => 0.00, 'credit_score' => 'Good', 'lead_source' => $source];
        if (preg_match('/(?:Name)\s*:\s*([A-Za-z\'\-\s]+)/i', $rawBody, $m)) {
            $parts = explode(' ', trim($m[1]), 2);
            $lead['first_name'] = $parts[0] ?? '';
            $lead['last_name'] = $parts[1] ?? '';
        }
        if (preg_match('/Phone\s*:\s*\(?([0-9]{3})\)?[-\s.]?([0-9]{3})[-\s.]?([0-9]{4})/i', $rawBody, $m)) {
            $lead['phone'] = sprintf('%s%s%s', $m[1], $m[2], $m[3]);
        }
        if (preg_match('/Loan\s+Amount\s*:\s*\$?([0-9,]+)/i', $rawBody, $m)) {
            $lead['loan_amount'] = (float)str_replace(',', '', $m[1]);
        }
        return $lead;
    }
}
