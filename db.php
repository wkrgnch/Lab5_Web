<?php 
    define('DB_HOST', 'localhost'); //Адрес
    define('DB_USER', 'root'); //Имя пользователя
    define('DB_PASSWORD', ''); //Пароль
    define('DB_NAME', 'lab5_data'); //Имя БД

    $mysql = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);

        // проверяем, нет ли ошибки
    if ($mysql->connect_error) {
        die('Ошибка подключения к БД: ' . $mysql->connect_error);
    }

    // на всякий случай задаём кодировку
    $mysql->set_charset('utf8mb4');
?>

