###########################
## Initial SQL Script   ##
###########################

CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL,
    password VARCHAR(255) NOT NULL,
    created DATETIME,
    modified DATETIME
);

CREATE TABLE tasks (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT NOT NULL,
    name VARCHAR(255) NOT NULL,
    description TEXT,
    status VARCHAR(20) NOT NULL,
    published BOOLEAN DEFAULT FALSE,
    created DATETIME,
    modified DATETIME,
    FOREIGN KEY user_key (user_id) REFERENCES users(id)
) CHARSET=utf8mb4;

INSERT INTO users (username, password, created, modified)
VALUES
('abc@aol.com', '12345', NOW(), NOW());

INSERT INTO tasks (user_id, name, description, status, published, created, modified)
VALUES
(1, 'First Post', 'This is the first task.', 'Not Started', 1, now(), now());
