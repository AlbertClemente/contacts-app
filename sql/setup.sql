DROP DATABASE IF EXISTS contacts_app;

CREATE DATABASE contacts_app;

USE contacts_app;

CREATE TABLE contacts (
  id INT AUTO_INCREMENT PRIMARY KEY,
  name VARCHAR(90),
  phone_number VARCHAR(30)
);

INSERT INTO contacts (name, phone_number) VALUES ("Albert", "931760000");
INSERT INTO contacts (name, phone_number) values ("Paco", "931745520");
