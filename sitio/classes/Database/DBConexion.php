<?php
namespace BookStore\Database;
use PDO;
class DBConexion
{
    public const DB_USER = 'root';
    public const DB_HOST = '127.0.0.1';
    public const DB_PASS = '';
    public const DB_NAME = 'dw3_navarro_raul';
    public const DB_DSN = 'mysql:host=' . self::DB_HOST . ';dbname=' . self::DB_NAME . ';charset=utf8mb4';
    //Instanciacion de la clase nativa PDO.
    protected static ?PDO $db = null;

    public static function conexion()
    {
        try {
            self::$db = new PDO(self::DB_DSN, self::DB_USER, self::DB_PASS);
            self::$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (Exception $e) {
            echo 'Error al conectar con mysql :(';
            exit;
        }
    }
    public static function getConexion ()
    {
        if(self::$db == null){
            self::conexion();
        }
        return self::$db;
    }
    }


?>