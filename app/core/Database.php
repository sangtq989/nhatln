<?php

class Database {

    private static $host = 'localhost';
    private static $db = 'tueminh'; 
    private static $user = 'root';
    private static $pw = 'root';

    private static function connect() {
        $pdo = new PDO('mysql:host=' . self::$host . ';dbname=' . self::$db .';charset=utf8', self::$user, self::$pw);
        $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
        $pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
        return $pdo;
    }

    public static function query($query) {
        $stmt = self::connect()->prepare($query);
        $stmt->execute();
        $data = $stmt->fetchAll();
        return $data;
    }

    // public static function login($user, $password) {
    //     $stmt = self::connect()->prepare("SELECT count(*) as user FROM users WHERE `user`='$user' AND `password`='$password'");
    //     $stmt->execute();
    //     $data = $stmt->fetchAll();
    //     return $data;
    // }
}

?>