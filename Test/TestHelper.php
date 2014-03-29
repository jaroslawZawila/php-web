<?php
/**
 * Created by PhpStorm.
 * User: zawila
 * Date: 25/03/14
 * Time: 21:02
 */

//App::uses('AppHelper', 'Test/Helper');

class TestHelper extends AppHelper{

    private $host = "localhost";
    private $db = "cake-test";
    private $user = "root";
    private $password = "root";
    private $conn;

    public function createConnection() {
        $this->conn = mysqli_connect($this->host, $this->user, $this->password, $this->db);
    }
} 