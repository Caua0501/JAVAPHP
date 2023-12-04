<?php
// Medina

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "InsercaoDados";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Falha na conexão: " . $conn->connect_error);
}

$sqlCreateFuncionarios = "CREATE TABLE IF NOT EXISTS funcionarios (
    id_funcionario INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(255),
    cargo VARCHAR(255)
)";

if ($conn->query($sqlCreateFuncionarios) === TRUE) {
    echo "Tabela 'funcionarios' criada com sucesso ou já existe.<br>";
} else {
    echo "Erro ao criar tabela 'funcionarios': " . $conn->error . "<br>";
}

$sqlCreateDepartamentos = "CREATE TABLE IF NOT EXISTS departamentos (
    id_departamento INT AUTO_INCREMENT PRIMARY KEY,
    nome_departamento VARCHAR(255)
)";

if ($conn->query($sqlCreateDepartamentos) === TRUE) {
    echo "Tabela 'departamentos' criada com sucesso ou já existe.<br>";
} else {
    echo "Erro ao criar tabela 'departamentos': " . $conn->error . "<br>";
}

$sqlInsertFuncionarios = "INSERT INTO funcionarios (nome, cargo) VALUES ('Cauã', 'Desenvolvedor'), ('Marcos', 'Gerente')";

if ($conn->query($sqlInsertFuncionarios) === TRUE) {
    echo "Dados inseridos na tabela 'funcionarios' com sucesso.<br>";
} else {
    echo "Erro ao inserir dados na tabela 'funcionarios': " . $conn->error . "<br>";
}

$sqlInsertDepartamentos = "INSERT INTO departamentos (nome_departamento) VALUES ('TI'), ('RH')";

if ($conn->query($sqlInsertDepartamentos) === TRUE) {
    echo "Dados inseridos na tabela 'departamentos' com sucesso.<br>";
} else {
    echo "Erro ao inserir dados na tabela 'departamentos': " . $conn->error . "<br>";
}

$conn->close();
?>
