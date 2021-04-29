<?php
$banco = "bd_acme";
$user = "root";
$passwd = "";
$hostname = "localhost";

// Conecta-se ao banco de dados MySQL
$mysqli = new mysqli($hostname, $user, $passwd, $banco);
// Caso algo tenha dado errado, exibe uma mensagem de erro
if (mysqli_connect_errno()) trigger_error(mysqli_connect_error());

