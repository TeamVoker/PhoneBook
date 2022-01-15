<?php
try {
    $connection = new PDO("mysql:host=localhost", 'root', 'root');
} catch (PDOException $e) {
    exit("Error: " . $e->getMessage());
}

try {

    $query = $connection->prepare("
    DROP DATABASE IF EXISTS `pdo-test`;
    CREATE DATABASE IF NOT EXISTS `pdo-test` /*!40100 DEFAULT CHARACTER SET utf8 */;
    USE `pdo-test`;

    DROP TABLE IF EXISTS `categories`;
    CREATE TABLE IF NOT EXISTS `categories` (
    `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
    `name` varchar(255) NOT NULL,
    PRIMARY KEY (`id`)
    ) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8;

    /*!40000 ALTER TABLE `categories` DISABLE KEYS */;
    INSERT INTO `categories` (`id`, `name`) VALUES
        (1, 'Ноутбуки и планшеты'),
        (2, 'Компьютеры и периферия'),
        (3, 'Комплектующие для ПК'),
        (4, 'Смартфоны и смарт-часы'),
        (5, 'Телевизоры и медиа'),
        (6, 'Игры и приставки'),
        (7, 'Аудиотехника'),
        (8, 'Фото-видеоаппаратура'),
        (9, 'Офисная техника и мебель'),
        (10, 'Сетевое оборудование'),
        (11, 'Крупная бытовая техника'),
        (12, 'Товары для кухни'),
        (13, 'Красота и здоровье'),
        (14, 'Товары для дома'),
        (15, 'Инструменты'),
        (16, 'Автотовары');
    /*!40000 ALTER TABLE `categories` ENABLE KEYS */;

    DROP TABLE IF EXISTS `users`;
    CREATE TABLE IF NOT EXISTS `users` (
    `id` int(11) NOT NULL AUTO_INCREMENT,
    `username` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
    `password` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
    PRIMARY KEY (`id`)
    ) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

    /*!40000 ALTER TABLE `users` DISABLE KEYS */;
    INSERT INTO `users` (`id`, `username`, `password`) VALUES
        (1, 'admin', '123');
    /*!40000 ALTER TABLE `users` ENABLE KEYS */;

    /*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
    /*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
    /*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
    /*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
    ");
    $query->execute();
} catch (Exception $exp) {

    echo "<pre>";
    var_dump($query);
    echo "</pre>";

    echo "<pre>";
    var_dump($exp);
    echo "</pre>";

    die();
}