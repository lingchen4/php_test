<?php
class main {
    private $db_conn;

    function __construct($db_conn){
        $this->db_conn = $db_conn;
    }

    public function defaultMethod() {
        include 'main.html';
    }
}