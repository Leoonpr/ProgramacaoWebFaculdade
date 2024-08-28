<?php
if (isset($_POST['comida'])) {
  $comidas = $_POST['comida'];
  
  echo "<h2>Comidas Selecionadas:</h2>";
  echo "<div>";
  foreach ($comidas as $comida) {
    echo "<p>$comida</p>";
  }
  echo "</div>";
} 
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Checkboxes de Comida</title>
</head>
<body>

<h2>Escolha suas comidas favoritas:</h2>

<form action="index.php" method="post">
  <input type="checkbox" id="pizza" name="comida[]" value="pizza">
  <label for="pizza">Pizza</label><br>

  <input type="checkbox" id="hamburguer" name="comida[]" value="hamburguer">
  <label for="hamburguer">Hambúrguer</label><br>

  <input type="checkbox" id="sushi" name="comida[]" value="sushi">
  <label for="sushi">Sushi</label><br>

  <input type="checkbox" id="tacos" name="comida[]" value="tacos">
  <label for="tacos">Tacos</label><br>

  <input type="checkbox" id="salada" name="comida[]" value="salada">
  <label for="salada">Salada</label><br>

  <input type="submit" value="Enviar">
</form>

</body>
</html>
