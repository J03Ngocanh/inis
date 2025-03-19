
<?php

class Model {
    protected $con;

    public function __construct() {
       
            $this->con = new mysqli('localhost','root','','dtb');                  
    }
}