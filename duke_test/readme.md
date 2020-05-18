# Instruction

### database
  1. mysql
  2. dbname = charisma
  3. host=localhost
  4. user = 'root'  password: '' (default) you can change it on 'database.php'
  5. table name = 'register'
      CREATE TABLE `charisma`.`register` (
      `id` INT NOT NULL AUTO_INCREMENT,
      `first_name` VARCHAR(45) NULL,
      `last_name` VARCHAR(45) NULL,
      `email` VARCHAR(45) NULL,
      `phone` VARCHAR(15) NULL,
      `city` VARCHAR(45) NULL,
      `postal_code` VARCHAR(10) NULL,
      `unit_size` VARCHAR(45) NULL,
      `hear_about` VARCHAR(45) NULL,
      `price` VARCHAR(45) NULL,
      `broker` TINYINT NULL,
      `casl` TINYINT NULL,
      `in_time` DATETIME NULL,
      PRIMARY KEY (`id`));

### validation
  1.	All fields are required, user cannot submit with empty fields.
  2.  First Name and Last Name are real and not bots,  letters only
  3.	Email Address is formatted as an Email. (Cant register if the email already registered)
  4.	Postal Code is formatted as a Postal Code (ie. M1W1M1)
  5.	User must has checked off CASL

### access to the app
  1. copy all file to xampp
  2. run xampp
  3. go to 'http://localhost/duke_test/'


### preview
  ![preview of website](preview.gif)