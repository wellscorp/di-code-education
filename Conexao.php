<?php

/**
 * Created by PhpStorm.
 * User: wel-t
 * Date: 8/9/2016
 * Time: 2:07 PM
 */

require_once "ConexaoInterface.php";

class Conexao implements ConexaoInterface
{

    private $host;
    private $db;
    private $user;
    private $password;

    public function __construct($host, $db, $user, $password)
    {
        $this->host = $host;
        $this->db = $host;
        $this->user = $db;
        $this->password = $password;
    }

    public function connect(){

        return new \PDO("mysql:host={$this->host};dbname={$this->db}", $this->user, $this->password);
    }

}