create database travel;
use travel;
drop database travel;

CREATE TABLE booking (
    id_booking INT AUTO_INCREMENT PRIMARY KEY,
    names VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL,
    phone VARCHAR(20) NOT NULL,
    address VARCHAR(255) NOT NULL,
    location VARCHAR(255) NOT NULL,
    guests INT NOT NULL,
    arrivals DATE NOT NULL,
    leaving DATE NOT NULL
);

SELECT * FROM booking;

CREATE TABLE user_reg (
    id_user_reg INT AUTO_INCREMENT PRIMARY KEY,
    name_user_reg VARCHAR(255) NOT NULL,
    username_user_reg VARCHAR(255) NOT NULL,
    password VARCHAR(255) NOT NULL
);

SELECT * FROM user_reg;

CREATE TABLE company_fly (
    id_company_fly INT AUTO_INCREMENT PRIMARY KEY,
    name_company_fly VARCHAR(255) NOT NULL,
    destination VARCHAR(255) NOT NULL,
    contract VARCHAR(255) NOT NULL,
    price_fly DECIMAL(10, 2) NOT NULL
);

SELECT * FROM company_fly;

CREATE TABLE hotels (
    id_hotels INT AUTO_INCREMENT PRIMARY KEY,
    name_hotels VARCHAR(255) NOT NULL,
    offer VARCHAR(255) NOT NULL,
    price_hotel DECIMAL(10, 2) NOT NULL,
    codCity VARCHAR(10) NOT NULL
);

SELECT * FROM hotels;

CREATE TABLE countries (
    id_countries INT AUTO_INCREMENT PRIMARY KEY,
    name_countries VARCHAR(255) NOT NULL,
    price_countries DECIMAL(10, 2) NOT NULL,
    id_company_fly INT,
    id_hotels INT,
    FOREIGN KEY (id_company_fly) REFERENCES company_fly(id_company_fly),
    FOREIGN KEY (id_hotels) REFERENCES hotels(id_hotels)
);

SELECT * FROM countries;

CREATE TABLE orders (
    id_orders INT AUTO_INCREMENT PRIMARY KEY,
    id_booking INT,
    id_user_reg INT,
    id_countries INT,
    id_hotels INT,
    id_company_fly INT,
    user_name VARCHAR(255),
    total_price DECIMAL(10, 2),
    FOREIGN KEY (id_booking) REFERENCES booking(id_booking),
    FOREIGN KEY (id_user_reg) REFERENCES user_reg(id_user_reg),
    FOREIGN KEY (id_countries) REFERENCES countries(id_countries),
    FOREIGN KEY (id_hotels) REFERENCES hotels(id_hotels),
    FOREIGN KEY (id_company_fly) REFERENCES company_fly(id_company_fly)
);

SELECT * FROM orders;


CREATE TABLE employees (
    id_employees INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(255) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL
);

select * from employees;
INSERT INTO employees (username, password) VALUES ('admin', 'AdminAdmin123');

-- Insert data into booking
INSERT INTO booking (names, email, phone, address, location, guests, arrivals, leaving) VALUES
('John Doe', 'john.doe@example.com', '123456789', '123 Main St', 'New York', 2, '2024-06-01', '2024-06-07'),
('Jane Smith', 'jane.smith@example.com', '987654321', '456 Oak St', 'Los Angeles', 4, '2024-07-15', '2024-07-20');

-- Select data from booking
SELECT * FROM booking;

-- Insert data into user_reg
INSERT INTO user_reg (name_user_reg, username_user_reg, password) VALUES
('John Doe', 'johndoe', 'password123'),
('Jane Smith', 'janesmith', 'password456');

-- Select data from user_reg
SELECT * FROM user_reg;

-- Insert data into company_fly
INSERT INTO company_fly (name_company_fly, destination, contract, price_fly) VALUES
('FlyHigh Airlines', 'New York', 'Contract A', 300.00),
('SkyTravel', 'Los Angeles', 'Contract B', 450.00);

-- Select data from company_fly
SELECT * FROM company_fly;

-- Insert data into hotels
INSERT INTO hotels (name_hotels, offer, price_hotel, codCity) VALUES
('Grand Hotel', 'Summer Offer', 200.00, 'NYC'),
('Beach Resort', 'Holiday Offer', 350.00, 'LA');

-- Select data from hotels
SELECT * FROM hotels;

-- Insert data into countries
INSERT INTO countries (name_countries, price_countries, id_company_fly, id_hotels) VALUES
('USA', 1000.00, 1, 1),
('Canada', 1200.00, 2, 2);

-- Select data from countries
SELECT * FROM countries;

-- Insert data into orders
INSERT INTO orders (id_booking, id_user_reg, id_countries, id_hotels, id_company_fly, user_name, total_price) VALUES
(1, 1, 1, 1, 1, 'John Doe', 1500.00),
(2, 2, 2, 2, 2, 'Jane Smith', 2000.00);

-- Select data from orders
SELECT * FROM orders;


