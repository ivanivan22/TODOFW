CREATE TABLE users (
    id INT NOT NULL AUTO_INCREMENT,
    email varchar(100) NOT NULL UNIQUE,
    uname varchar(100) NOT NULL UNIQUE,
    passw varchar(120) NOT NULL,
    role INT NOT NULL,
    PRIMARY KEY (id)
);

CREATE TABLE tasks (
    id INT NOT NULL AUTO_INCREMENT,
    description VARCHAR(255) NOT NULL,
    user INT NOT NULL,
    due_date DATETIME NOT NULL,
    PRIMARY KEY (id)
);

CREATE TABLE task_item (
    id INT NOT NULL AUTO_INCREMENT,
    item VARCHAR (255) NOT NULL,
    completed BOOLEAN
);
 