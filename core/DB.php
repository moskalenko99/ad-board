<?php

namespace ad;

use PDO;

class DB {

    use TSingletone;

    public $pdo;

    protected function __construct()
    {
        $db = require_once CONF . '/config_db.php';
        $this->pdo = new PDO($db['dsn'], $db['user'], $db['pass']);
    }

}
