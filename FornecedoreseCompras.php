<?php
// Cauã

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "InsercaoDados";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Falha na conexão: " . $conn->connect_error);
}

$sqlCreateFornecedores = "CREATE TABLE IF NOT EXISTS fornecedores (
    id_fornecedor INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(255),
    contato VARCHAR(255)
)";

if ($conn->query($sqlCreateFornecedores) === TRUE) {
    echo "Tabela 'fornecedores' criada com sucesso ou já existe.<br>";
} else {
    echo "Erro ao criar tabela 'fornecedores': " . $conn->error . "<br>";
}

$sqlCreateCompras = "CREATE TABLE IF NOT EXISTS compras (
    id_compra INT AUTO_INCREMENT PRIMARY KEY,
    id_fornecedor INT,
    produto_comprado VARCHAR(255),
    quantidade INT
)";

if ($conn->query($sqlCreateCompras) === TRUE) {
    echo "Tabela 'compras' criada com sucesso ou já existe.<br>";
} else {
    echo "Erro ao criar tabela 'compras': " . $conn->error . "<br>";
}

$sqlInsertFornecedores = "INSERT INTO fornecedores (nome, contato) VALUES ('Fornecedor A', 'Contato A'), ('Fornecedor B', 'Contato B')";

if ($conn->query($sqlInsertFornecedores) === TRUE) {
    echo "Dados inseridos na tabela 'fornecedores' com sucesso.<br>";
} else {
    echo "Erro ao inserir dados na tabela 'fornecedores': " . $conn->error . "<br>";
}

$sqlInsertCompras = "INSERT INTO compras (id_fornecedor, produto_comprado, quantidade) VALUES (1, 'Produto A', 100), (2, 'Produto B', 50)";

if ($conn->query($sqlInsertCompras) === TRUE) {
    echo "Dados inseridos na tabela 'compras' com sucesso.<br>";
} else {
    echo "Erro ao inserir dados na tabela 'compras': " . $conn->error . "<br>";
}

$conn->close();
?>