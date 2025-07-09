CREATE DATABASE IF NOT EXISTS userDB;
USE userDB;

CREATE TABLE IF NOT EXISTS users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    userName VARCHAR(50) NOT NULL,
    userPass VARCHAR(255) NOT NULL
);

-- Password: password123
INSERT INTO users (userName, userPass) VALUES (
    'john_doe',
    '$2y$10$Wz6WxVL3q6Tkp4UY.QvTiuwM86b/NWexyDAE0FeNaZXlJbeQG9Lxe'
);
