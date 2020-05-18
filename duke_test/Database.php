<?php
class Database {
    private $pdo;

    /*
    CREATE SCHEMA `charisma`;

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
    */
    private function getInstance() {
        if (!$this->pdo) {
            $this->pdo = new PDO("mysql:dbname=charisma;host=localhost", 'root', '');
        }

        return $this->pdo;
    }

    public function checkEmail($email)
    {
        $stmt = $this->getInstance()->prepare('SELECT * FROM register WHERE email=:email');

        $stmt->execute(
            array(
                ':email' => $email
            )
        );

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function register($first_name,$last_name,$email,$phone,$city,$postal_code,$unit_size,$hear_about,$price,$broker,$casl) {
        $in_time = date('Y-m-d H:i:s');
        $stmt = $this->getInstance()->prepare('INSERT INTO register(first_name,last_name,email,phone,city,postal_code,unit_size,hear_about,price,broker,casl,in_time) VALUES (:first_name,:last_name,:email,:phone,:city,:postal_code,:unit_size,:hear_about,:price,:broker,:casl,:in_time)');

        $result = $stmt->execute(
            array(
                ':first_name' => $first_name,
                ':last_name' => $last_name,
                ':email' => $email,
                ':phone' => $phone,
                ':city' => $city,
                ':postal_code' => $postal_code,
                ':unit_size' => $unit_size,
                ':hear_about' => $hear_about,
                ':price' => $price,
                ':broker' => $broker,
                ':casl' => $casl,
                ':in_time' => $in_time,
            )
        );
        return $result;
    }
}