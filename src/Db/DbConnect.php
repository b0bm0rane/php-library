<?php 

namespace B0bm0rane\PhpLibrary\Db;

use Exception;
use PDO; 

/**
 * Connexion à la base de données (SINGLETON)
 */
class DbConnect
{

    private static array $config;

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
            self::$instance = new PDO('mysql:host='.self::$config['db_host'].';port='.self::$config['db_port'].';dbname='.self::$config['db_name'].';charset=utf8', self::$config['db_user'], self::$config['db_password'], [
            // self::$instance = new PDO('mysql:host=localhost;port=3306;dbname=db_cars;charset=utf8', 'root', '', [
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                PDO::ATTR_EMULATE_PREPARES => false,
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
            ]);
        }
        return self::$instance;
    }
    public static function setConfiguration(string $chemin_vers_le_fichier) : void
    {
        if(is_file($chemin_vers_le_fichier)){
            self::$config = require $chemin_vers_le_fichier;
            var_export(self::$config);
        }
        else{
            throw new Exception("Erreur");
        }
    }
}
