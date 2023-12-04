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

$sqlCreateeventos = "CREATE TABLE IF NOT EXISTS eventos (
    id_evento INT AUTO_INCREMENT PRIMARY KEY,
    nome_evento VARCHAR(255),
    data TIMESTAMP DEFAULT CURRENT_TIMESTAMP
)";

if ($conn->query($sqlCreateeventos) === TRUE) {
    echo "Tabela 'eventos' criada com sucesso ou já existe.<br>";
} else {
    echo "Erro ao criar tabela 'eventos': " . $conn->error . "<br>";
}

$sqlCreateparticipantes = "CREATE TABLE participantes (
    id_participante INT AUTO_INCREMENT PRIMARY KEY,
    id_evento INT )
";

if ($conn->query($sqlCreateparticipantes) === TRUE) {
    echo "Tabela 'participantes' criada com sucesso ou já existe.<br>";
} else {
    echo "Erro ao criar tabela 'participantes': " . $conn->error . "<br>";
}

$sqlInserteventos = "INSERT INTO eventos (nome_evento) VALUES ('Cauã'), ('Marcos')";

if ($conn->query($sqlInserteventos) === TRUE) {
    echo "Dados inseridos na tabela 'eventos' com sucesso.<br>";
} else {
    echo "Erro ao inserir dados na tabela 'eventos': " . $conn->error . "<br>";
}

$sqlInsertparticipantes = "INSERT INTO participantes (id_participante, id_evento) VALUES (1,1), (2,2)";

if ($conn->query($sqlInsertparticipantes) === TRUE) {
    echo "Dados inseridos na tabela 'participantes' com sucesso.<br>";
} else {
    echo "Erro ao inserir dados na tabela 'participantes': " . $conn->error . "<br>";
}

$conn->close();
?>