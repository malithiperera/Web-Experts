<?php

$servername = "localhost";
        $username = "root";
        $password = "";
<<<<<<< HEAD
        $dbname = "himalee dairy products";
=======

        $dbname = "himalee dairy products";

>>>>>>> 1597c5a96c39bf8af27db41318af38b11b54f74c

        // Create connection
        $conn = new mysqli($servername, $username, $password, $dbname);
        
        // Check connection
        if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
        }
        