<?php
require_once dirname(dirname(__FILE__)) . '/config.php';

class Model
{
    protected $con;

    public function __construct()
    {
        $this->con = new mysqli(
            $_ENV['DATABASE_HOST'],
            $_ENV['DATABASE_USER'],
            $_ENV['DATABASE_PASS'],
            $_ENV['DATABASE_NAME']
        );
        $this->con->set_charset("utf8mb4");

        if ($this->con->connect_error) {
            die("Connection failed: " . $this->con->connect_error);
        }
    }
}