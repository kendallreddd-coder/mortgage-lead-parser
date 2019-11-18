-- Database schema for inbound mortgage leads
CREATE TABLE IF NOT EXISTS `leads` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `first_name` VARCHAR(60) NOT NULL,
  `last_name` VARCHAR(60) NOT NULL,
  `phone` VARCHAR(14) NOT NULL,
  `email` VARCHAR(120) NOT NULL,
  `loan_amount` DECIMAL(12,2) NOT NULL DEFAULT '0.00',
  `credit_score` VARCHAR(30) DEFAULT NULL,
  `lead_source` VARCHAR(50) NOT NULL,
  `status` ENUM('new', 'assigned', 'contacted', 'archived') NOT NULL DEFAULT 'new',
  `created_at` DATETIME NOT NULL,
  PRIMARY KEY (`id`),
  KEY `idx_leads_lookup` (`phone`, `email`, `created_at`),
  KEY `idx_leads_status` (`status`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
