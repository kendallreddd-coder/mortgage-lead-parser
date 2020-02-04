# Mortgage Lead Parser & CRM Ingestion Engine

Custom background ingestion service built for a regional mortgage brokerage firm. Parses incoming webhook payloads and unstructured IMAP emails from third-party lead generators (Zillow, LendingTree, LendingAffiliates), formats borrower income and credit metrics, and injects normalized records into a local MySQL CRM schema.

> **Client Handoff Notice:** Deliverable codebase provided directly to client. Proprietary API keys, third-party tokens, and sensitive database credentials have been sanitized or redacted per client agreement.

## Architecture
- **Runtime:** PHP 7.3 CLI via Linux crontab every 60 seconds with lockfile protection.
- **Database:** MySQL 5.7 InnoDB with composite indices on phone, email, and timestamp.
- **Deduplication:** Row-locking (`FOR UPDATE`) verification against trailing 90-day borrower records.

<!-- Sanitized production deliverable: Handed off Feb 2020 -->
