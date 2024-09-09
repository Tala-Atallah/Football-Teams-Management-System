<?php
$host = 'localhost';
$user = 'c149_1202575';
$password = 'comp334!';
$db_name = 'c149_project';

    try{
        $conn= new PDO("mysql:host=localhost;dbname=c149_project",$user,$password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $e) {
        echo "Connection failed: " . $e->getMessage();
    }

?>