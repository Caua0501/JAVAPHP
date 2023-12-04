<?php

//Cauã
function obterCategorias($conn) {
    $sql = "SELECT id_categoria, nome_categoria FROM categorias";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    return $stmt->fetchAll();
}

function inserirProduto($conn, $nome_produto, $preco) {
    $sql = "INSERT INTO produtos (nome_produto, preco) VALUES (?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(1, $nome_produto);
    $stmt->bindParam(2, $preco);
    $stmt->execute();
}

$conn = new PDO("mysql:host=localhost;dbname=InsercaoDados", "root", "");

$categorias = obterCategorias($conn);

echo "<form action='ProdutoseCategorias.php' method='post'>";
echo "<input type='text' name='nome_produto' placeholder='Nome do produto' required>";
echo "<input type='number' name='preco' placeholder='PreÃ§o' required>";
echo "<select name='id_categoria'>";

foreach ($categorias as $categoria) {
    echo "<option value='{$categoria['id_categoria']}'>{$categoria['nome_categoria']}</option>";
}

echo "</select>";
echo "<input type='submit' value='Cadastrar'>";
echo "</form>";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $nome_produto = $_POST["nome_produto"];
    $preco = $_POST["preco"];

    inserirProduto($conn, $nome_produto, $preco);

    header("Location: InsercaoDados.php");
}

?>
