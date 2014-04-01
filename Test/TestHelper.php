<?php
/**
 * Created by PhpStorm.
 * User: zawila
 * Date: 25/03/14
 * Time: 21:02
 */

App::uses('File', 'Utility');

class TestHelper {

    private $host = "localhost";
    private $db = "cake-test3";
    private $user = "root";
    private $password = "root";
    private $conn;

    function __construct() {
        $this->conn = mysqli_connect($this->host, $this->user, $this->password, $this->db);

        if (mysqli_connect_errno())
        {
            echo "Failed to connect to MySQL: " . mysqli_connect_error();
        }
    }

    public function initData($filename){
        $file = new File("/var/www/cakephp/app/Test/Sql/" . $filename);
        $content = $file->read();

        if ( !mysqli_multi_query($this->conn, $content))
        {
            die('Error: ' . mysqli_error($this->conn));
        }
    }

    public function cleanData($table) {

        $content = 'truncate ' . $table;

        if ( !mysqli_query($this->conn, $content))
        {
            die('Error: ' . mysqli_error($this->conn));
        }
    }

    public function dropSchema() {

        $content = 'drop schema `caketest3`';

        if ( !mysqli_query($this->conn, $content))
        {
            die('Error: ' . mysqli_error($this->conn));
        }
    }
} 