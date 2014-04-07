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

    public function init() {
        $file = new File("/var/www/cakephp/app/Test/Sql/init.sql");
        $content = $file->read();

        if ( !mysqli_multi_query($this->conn, $content))
        {
            die('Error: ' . mysqli_error($this->conn));
        }
        mysqli_close($this->conn);
        sleep(1);
    }

    public function initData($filename){
        $this->conn = mysqli_connect($this->host, $this->user, $this->password, $this->db);

        if (mysqli_connect_errno())
        {
            echo "Failed to connect to MySQL: " . mysqli_connect_error();
        }

        $file = new File("/var/www/cakephp/app/Test/Sql/" . $filename);
        $content = $file->read();


        if ( !mysqli_multi_query($this->conn, $content))
        {
            die('Error: ' . mysqli_error($this->conn));
        }
//        mysqli_next_result($this->conn);
        mysqli_close($this->conn);
        sleep(1);
    }

    public function dropSchema() {
        $this->conn = mysqli_connect($this->host, $this->user, $this->password, $this->db);

        if (mysqli_connect_errno())
        {
            echo "Failed to connect to MySQL: " . mysqli_connect_error();
        }

        $content = 'drop database caketest';

        if ( !mysqli_query($this->conn, $content))
        {
            die('Error: ' . mysqli_error($this->conn));
        }
        mysqli_close($this->conn);
    }
} 