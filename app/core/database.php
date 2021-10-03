<?php

$servername = "localhost";
        $username = "root";
        $password = "";
<<<<<<< HEAD
        $dbname = "himalee dairy products";
=======

        $dbname = "himalee dairy products";

>>>>>>> f8a0c70182c9a4ca88b957f00b4f561ce7233880

        // Create connection
        $conn = new mysqli($servername, $username, $password, $dbname);
        
        // Check connection
        if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
        }
        