<?php
$servername = "localhost";
$database = "db"; # Nome do Banco de Dados!
$username = "root";
$password = "";


$conn = mysqli_connect($servername, $username, $password, $database);

if (!$conn) {
    die("Conexão falhou. Erro: " . mysqli_connect_error());
}
