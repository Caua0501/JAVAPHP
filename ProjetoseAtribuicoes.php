<?php
//Cauã

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "InsercaoDados";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Falha na conexão: " . $conn->connect_error);
}

$sqlCreateProjetos = "CREATE TABLE IF NOT EXISTS projetos (
    id_projeto INT AUTO_INCREMENT PRIMARY KEY,
    nome_projeto VARCHAR(255),
    descricao VARCHAR(255)
)";

if ($conn->query($sqlCreateProjetos) === TRUE) {
    echo "Tabela 'projetos' criada com sucesso ou já existe.<br>";
} else {
    echo "Erro ao criar tabela 'projetos': " . $conn->error . "<br>";
}

$sqlCreateAtribuicoes = "CREATE TABLE IF NOT EXISTS atribuicoes (
    id_atribuicao INT AUTO_INCREMENT PRIMARY KEY,
    id_projeto INT,
    id_funcionario INT
)";

if ($conn->query($sqlCreateAtribuicoes) === TRUE) {
    echo "Tabela 'atribuicoes' criada com sucesso ou já existe.<br>";
} else {
    echo "Erro ao criar tabela 'atribuicoes': " . $conn->error . "<br>";
}

$sqlInsertProjetos = "INSERT INTO projetos (nome_projeto, descricao) VALUES ('Projeto A', 'Descrição do Projeto A'), ('Projeto B', 'Descrição do Projeto B')";

if ($conn->query($sqlInsertProjetos) === TRUE) {
    echo "Dados inseridos na tabela 'projetos' com sucesso.<br>";
} else {
    echo "Erro ao inserir dados na tabela 'projetos': " . $conn->error . "<br>";
}

$sqlInsertAtribuicoes = "INSERT INTO atribuicoes (id_projeto, id_funcionario) VALUES (1, 1), (2, 2)";

if ($conn->query($sqlInsertAtribuicoes) === TRUE) {
    echo "Dados inseridos na tabela 'atribuicoes' com sucesso.<br>";
} else {
    echo "Erro ao inserir dados na tabela 'atribuicoes': " . $conn->error . "<br>";
}

$conn->close();
?>