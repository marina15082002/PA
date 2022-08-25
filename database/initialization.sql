DROP DATABASE IF EXISTS `pa-rattrapage`;

CREATE DATABASE `pa-rattrapage` CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;

CREATE TABLE IF NOT EXISTS USERS(
    id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    type VARCHAR(25) NOT NULL,
    name VARCHAR(50) NOT NULL,
    email VARCHAR(50) NOT NULL,
    siren CHAR(9) NOT NULL,
    phone VARCHAR(12) NOT NULL,
    country VARCHAR(25) NOT NULL,
    city VARCHAR(25) NOT NULL,
    address VARCHAR(255) NOT NULL,
    password VARCHAR(100) NOT NULL,
    role VARCHAR(25) DEFAULT 'user'
) ENGINE = InnoDB;

CREATE TABLE IF NOT EXISTS ADMIN(
    id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(50) NOT NULL,
    email VARCHAR(50) NOT NULL,
    phone VARCHAR(12) NOT NULL,
    password VARCHAR(100) NOT NULL,
    poste VARCHAR(25) NOT NULL
    ) ENGINE = InnoDB;

CREATE TABLE IF NOT EXISTS COLLECT(
    id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    date DATE NOT NULL,
    hours INT NOT NULL,
    email VARCHAR(50) NOT NULL,
    phone VARCHAR(12) NOT NULL,
    country VARCHAR(25) NOT NULL,
    city VARCHAR(25) NOT NULL,
    address VARCHAR(255) NOT NULL,
    status INT DEFAULT FALSE
) ENGINE = InnoDB;

CREATE TABLE IF NOT EXISTS STOCKAGE(
    id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    product_code CHAR(13) NOT NULL,
    quantity INT NOT NULL
) ENGINE = InnoDB;

CREATE TABLE IF NOT EXISTS PRODUCT_COLLECT(
    id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    email VARCHAR(50) NOT NULL,
    product_code CHAR(13) NOT NULL,
    product_name VARCHAR(50) NOT NULL,
    quantity INT NOT NULL
) ENGINE = InnoDB;

CREATE TABLE IF NOT EXISTS PRODUCT_DISTRIB(
    id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    id_distrib INT NOT NULL,
    product_code CHAR(13) NOT NULL,
    quantity INT NOT NULL
    ) ENGINE = InnoDB;

CREATE TABLE IF NOT EXISTS DISTRIB(
    id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    date DATE NOT NULL,
    address VARCHAR(255) NOT NULL,
    status INT DEFAULT FALSE
    ) ENGINE = InnoDB;

INSERT INTO USERS (type, name, email, siren, phone, country, city, address, password) VALUES ("Entreprise", "Robert", "marina@gmail.com", "123456789", "0781811058", "France", "Paris", "1 rue de la paix", "97dee97560699a639f3cf55c464855eefe97ae97493b242fe01ecdbab39ea463");
INSERT INTO USERS (type, name, email, siren, phone, country, city, address, password) VALUES ("Entreprise", "Robert", "marina1508@gmail.com", "123456789", "0781811058", "France", "Paris", "1 rue de la paix", "97dee97560699a639f3cf55c464855eefe97ae97493b242fe01ecdbab39ea463");

