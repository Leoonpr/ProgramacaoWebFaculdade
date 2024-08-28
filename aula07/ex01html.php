<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Products</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            border: 1px solid black;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>

<?php
try {
    $pdo = new PDO(
        'mysql:dbname=exerciciosphpbd;host=localhost;charset=utf8',
        'root',
        '',
        [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]
    );

    // Prepare and execute the SQL statement
    $ps = $pdo->prepare('SELECT * FROM produto');
    $ps->execute();

    // Fetch all rows from the result set
    $produtos = $ps->fetchAll(PDO::FETCH_ASSOC);

    // Output the table header
    echo '<table>';
    echo '<thead><tr><th>ID</th><th>Nome</th><th>Estoque</th><th>Preco</th></tr></thead>';
    echo '<tbody>';

    // Output each row of the table
    foreach ($produtos as $p) {
        echo '<tr>
        <td>' . $p['id'] . '</td>
        <td>' . $p['nome']  .  '</td> 
        <td>' . $p['quantidade'] . ' produtos' . '</td> 
        <td>'. 'R$ ' . $p['preco'] .  '</td> 
        </tr>';
    }

    echo '</tbody>';
    echo '</table>';
} catch(PDOException $e) {
    // Handle database connection error
    die('Erro: ' . $e->getMessage());
}
?>

</body>
</html>
