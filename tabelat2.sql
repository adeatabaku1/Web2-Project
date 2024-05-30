create database LLOGARITJA_KREDIVE;
use LLOGARITJA_KREDIVE;



-- Create the 'kliente' table
CREATE TABLE kliente (
    id_klient INT AUTO_INCREMENT PRIMARY KEY,
    emri VARCHAR(255) NOT NULL,
    mbiemri VARCHAR(255) NOT NULL,
    adresa VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL,
    numer_identifikimi VARCHAR(255) NOT NULL,
    numer_telefoni VARCHAR(20) NOT NULL,
    numer_llogarie VARCHAR(20) NOT NULL
);
ALTER TABLE kliente
MODIFY COLUMN numer_telefoni VARCHAR(30);
select * from kliente;
-- Create the 'orders' table
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

-- Create the 'llogaritje_bankare' table
CREATE TABLE llogaritje_bankare (
    id_llogaritje_bankare INT AUTO_INCREMENT PRIMARY KEY,
    id_klient INT,
    balanca DECIMAL(10, 2) NOT NULL,
    monedha VARCHAR(10) NOT NULL,
    FOREIGN KEY (id_klient) REFERENCES kliente(id_klient)
);

-- Create a stored procedure or function for 'transfero_shumen'
DELIMITER //
CREATE FUNCTION transfero_shumen(from_card VARCHAR(20), to_account VARCHAR(20), amount DECIMAL(10, 2))
RETURNS DECIMAL(10, 2)
BEGIN
    DECLARE balance DECIMAL(10, 2);
    DECLARE new_balance DECIMAL(10, 2);
    DECLARE currency VARCHAR(10);

    -- Example logic to subtract the amount from the from_card and add it to the to_account
    SELECT balanca INTO balance FROM llogaritje_bankare WHERE numer_llogarie = from_card;
    SET new_balance = balance - amount;
    UPDATE llogaritje_bankare SET balanca = new_balance WHERE numer_llogarie = from_card;

    SELECT balanca INTO balance FROM llogaritje_bankare WHERE numer_llogarie = to_account;
    SET new_balance = balance + amount;
    UPDATE llogaritje_bankare SET balanca = new_balance WHERE numer_llogarie = to_account;

    SELECT monedha INTO currency FROM llogaritje_bankare WHERE numer_llogarie = to_account;

    RETURN new_balance;
END //
DELIMITER ;
