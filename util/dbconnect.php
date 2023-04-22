<?php


class DBConnect
{

    private $db = 'webbear';
    private $sv = 'webbear.mysql.database.azure.com';
    private $us = 'lnhau';
    private $pw = 'lnhau94';
    private $connection;
    function __construct()
    {
        $this->connection = new mysqli($this->sv, $this->us, $this->pw, $this->db);
    }

    public function getConnection()
    {
        if($this->connection == null) $this->connection = new mysqli($this->sv, $this->us, $this->pw, $this->db);
        return $this->connection;
    }
    public function setConnection($connection)
    {
        $this->connection = $connection;
    }

}

?>