<?php
$servername = "localhost";
$port = "3306";
$username = "root"; 
$password = ""; 
$dbname = "incognita";

// criar conexão
$conn = new mysqli($servername . ":" . $port, $username, $password, $dbname);

// checar conexão
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// pra fins de resetar senha, setei o valor da variável mysqli igual conn
$mysqli = $conn;

?>