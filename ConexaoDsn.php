<?php

/**
 * Created by PhpStorm.
 * User: wel-t
 * Date: 8/9/2016
 * Time: 3:03 PM
 */

require_once "ConexaoInterface.php";

class ConexaoDsn implements ConexaoInterface
{
    private $dsn;
    private $user;
    private $password;

    public function __construct($dsn, $user, $password)
    {
        $this->dsn = $dsn;
        $this->user = $user;
        $this->password = $password;
    }

    public function connect(){

        return new \PDO($this->dsn, $this->user, $this->password);
    }

}