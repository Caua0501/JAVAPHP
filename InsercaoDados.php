<?php
//Cauã

$conn = new PDO("mysql:host=localhost;dbname=InsercaoDados", "root", "");

echo "<form action='InsercaoDados.php' method='post'>";
echo "<input type='text' name='nome' placeholder='Nome' required>";
echo "<input type='email' name='email' placeholder='E-mail' required>";
echo "<input type='submit' value='Cadastrar'>";
echo "</form>";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $nome = $_POST["nome"];
    $email = $_POST["email"];

    $sql = "INSERT INTO usuarios (nome, email) VALUES (?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bindValue(1, $nome);
    $stmt->bindValue(2, $email);
    $stmt->execute();

    $sql = "SELECT id_usuario FROM usuarios ORDER BY id_usuario DESC LIMIT 1";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $result = $stmt->fetch();
    $id_usuario = $result["id_usuario"];

    $sql = "INSERT INTO pedidos (id_usuario, produto, quantidade) VALUES (?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bindValue(1, $id_usuario);
    $stmt->bindValue(2, "Produto 1");
    $stmt->bindValue(3, 1);
    $stmt->execute();

    header("Location: InsercaoDados.php");
}

?>




