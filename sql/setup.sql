DROP DATABASE IF EXISTS contacts_app;

CREATE DATABASE contacts_app;

USE contacts_app;

CREATE TABLE
    users (
        id INT AUTO_INCREMENT PRIMARY KEY,
        name VARCHAR(90),
        email VARCHAR(255) UNIQUE,
        password VARCHAR(255)
    );

drop table users;

CREATE TABLE contacts (
  id INT AUTO_INCREMENT PRIMARY KEY,
  name VARCHAR(90),
  phone_number VARCHAR(30),
  userid INT NOT NULL,
  FOREIGN KEY (userid) REFERENCES users(id)
);

drop table contacts;


INSERT INTO contacts (name, phone_number) VALUES ("Albert", "931760000");
INSERT INTO contacts (name, phone_number) values ("Paco", "931745520");
