<?php 

namespace b0bm0rane\Db;

use PDO; 

/**
 * Connexion à la base de données (SINGLETON)
 */
class DbConnect
{
    /**
     * Constructeur privé (la classe n'est pas instanciable)
     */
    private function __construct() {}

    /** @var PDO $instance l'instance PDO unique */
    private static ?PDO $instance = null;

    /**
     * Récupère l'instance unique de PDO
     * La crée si elle n'existe pas encore
     * @return PDO l'instance de PDO
     */
    public static function getInstance(): PDO
    {
        if(self::$instance === null) {
            self::$instance = new PDO('mysql:host=localhost;port=3306;dbname=db_cars;charset=utf8', 'root', '', [
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                PDO::ATTR_EMULATE_PREPARES => false,
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
            ]);
        }
        return self::$instance;
    }
}
