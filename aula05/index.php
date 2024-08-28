<?php
// Classe para representar um produto
class Product {
    public $name;
    public $description;
    public $value;
    public $available;

    public function __construct($name, $description, $value, $available) {
        $this->name = $name;
        $this->description = $description;
        $this->value = $value;
        $this->available = $available;
    }
}

// Função para exibir a lista de produtos
function displayProducts($products) {
    if (empty($products)) {
        echo "Nenhum produto cadastrado ainda.";
    } else {
        echo "<h2>Lista de produtos por valor:</h2>";
        echo "<ul>";
        foreach ($products as $product) {
            echo "<li>{$product->name} - Valor: {$product->value}</li>";
        }
        echo "</ul>";
    }
}

// Função para ordenar os produtos pelo valor
function sortByValue($a, $b) {
    return $a->value - $b->value;
}

// Função para carregar produtos do arquivo
function loadProducts() {
    $products = [];
    $file = 'products.txt';
    if (file_exists($file)) {
        $lines = file($file);
        foreach ($lines as $line) {
            $data = explode(',', $line);
            $product = new Product($data[0], $data[1], $data[2], $data[3]);
            $products[] = $product;
        }
    }
    return $products;
}

// Função para salvar produtos no arquivo
function saveProducts($products) {
    $file = 'products.txt';
    $fp = fopen($file, 'w');
    foreach ($products as $product) {
        fwrite($fp, "{$product->name},{$product->description},{$product->value},{$product->available}\n");
    }
    fclose($fp);
}

// Inicialização da lista de produtos
$products = loadProducts();

// Verificação do método de requisição
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recebendo os dados do formulário
    $name = $_POST["name"];
    $description = $_POST["description"];
    $value = $_POST["value"];
    $available = $_POST["available"] == "sim" ? true : false;

    // Criando um novo produto
    $product = new Product($name, $description, $value, $available);

    // Adicionando o produto à lista de produtos
    $products[] = $product;

    // Ordenando os produtos pelo valor
    usort($products, "sortByValue");

    // Salvando os produtos no arquivo
    saveProducts($products);

    // Exibindo a lista de produtos atualizada
    displayProducts($products);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Produtos</title>
</head>
<body>
    <h1>Cadastro de Produtos</h1>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <label for="name">Nome do produto:</label><br>
        <input type="text" id="name" name="name"><br>

        <label for="description">Descrição do produto:</label><br>
        <input type="text" id="description" name="description"><br>

        <label for="value">Valor do produto:</label><br>
        <input type="text" id="value" name="value"><br>

        <label for="available">Disponível para venda?</label><br>
        <select id="available" name="available">
            <option value="sim">Sim</option>
            <option value="nao">Não</option>
        </select><br><br>

        <input type="submit" value="Cadastrar Produto">
    </form>

    <?php
    // Exibindo a lista de produtos
    displayProducts($products);
    ?>
</body>
</html>
