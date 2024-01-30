<?php

use B0bm0rane\PhpLibrary\Db\DbConnect;

require "../../vendor/autoload.php";

DbConnect::setConfiguration("./config.php");

$pdo = DbConnect::getInstance();

var_export($pdo);
