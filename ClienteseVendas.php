<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "InsercaoDados";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Falha na conexão: " . $conn->connect_error);
}

$sqlCreateClientes = "CREATE TABLE IF NOT EXISTS clientes (
    id_cliente INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(255),
    email VARCHAR(255)
)";

if ($conn->query($sqlCreateClientes) === TRUE) {
    echo "Tabela 'clientes' criada com sucesso ou já existe.<br>";
} else {
    echo "Erro ao criar tabela 'clientes': " . $conn->error . "<br>";
}

$sqlCreateVendas = "CREATE TABLE IF NOT EXISTS vendas (
    id_venda INT AUTO_INCREMENT PRIMARY KEY,
    id_cliente INT,
    produto_vendido VARCHAR(255),
    valor DECIMAL(10,2)
)";

if ($conn->query($sqlCreateVendas) === TRUE) {
    echo "Tabela 'vendas' criada com sucesso ou já existe.<br>";
} else {
    echo "Erro ao criar tabela 'vendas': " . $conn->error . "<br>";
}

$sqlInsertClientes = "INSERT INTO clientes (nome, email) VALUES ('Cliente A', 'elmamaria@gmail.com'), ('Cliente B', 'avagina@gmail.com')";

if ($conn->query($sqlInsertClientes) === TRUE) {
    echo "Dados inseridos na tabela 'clientes' com sucesso.<br>";
} else {
    echo "Erro ao inserir dados na tabela 'clientes': " . $conn->error . "<br>";
}

$sqlInsertVendas = "INSERT INTO vendas (id_cliente, produto_vendido, valor) VALUES (1, 'Produto X', 50.00), (2, 'Produto Y', 75.50)";

if ($conn->query($sqlInsertVendas) === TRUE) {
    echo "Dados inseridos na tabela 'vendas' com sucesso.<br>";
} else {
    echo "Erro ao inserir dados na tabela 'vendas': " . $conn->error . "<br>";
}

$conn->close();
//Cauã
?>
