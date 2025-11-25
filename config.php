<?php
define('HOST', 'localhost');
define('USER', 'root');
define('PASS', '');
define('BASE', 'gestao_receitas_despesas');

$conn = new mysqli(HOST, USER, PASS, BASE);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>