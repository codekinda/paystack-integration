<?php
$host = "localhost";
$username = "root";
$password ="";
$dbname = "payment";

//Set the data source
$dsn = "mysql:host=".$host.";dbname=".$dbname;
//Creating the pdo instance
$pdo = new PDO($dsn, $username, $password);
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
?>
