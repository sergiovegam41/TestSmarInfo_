SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

CREATE TABLE IF NOT EXISTS essays (
  id int(11) NOT NULL AUTO_INCREMENT,
  name varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (id)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE IF NOT EXISTS users (
  id int(11) NOT NULL AUTO_INCREMENT,
  name varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  last_name varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  identification_type varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  identification_number varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  phone_number varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  address varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  email varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  password varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  file_url varchar(255) COLLATE utf8mb4_unicode_ci,
  essay_id int(11),
  PRIMARY KEY (id),
  FOREIGN KEY (essay_id) REFERENCES essays(id)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

ALTER TABLE users
MODIFY id int(11) NOT NULL AUTO_INCREMENT;

ALTER TABLE essays
MODIFY id int(11) NOT NULL AUTO_INCREMENT;