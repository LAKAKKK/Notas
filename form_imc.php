<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Formulário de IMC</title>
    <style>
 body{
  font-family: Arial, sans-serif;
  max-width: 1250px;
  margin: 0 auto;
  padding: 1px;
 }

 h1{
  font-size: 3.5em;
  margin-bottom: 0.5em;
 }

 p{
  font-size: 1.2em;
  margin-bottom: 1em;
 }

 ul{
  list-style-type: none;
  padding: 0;
 }

 li{
  margin-bottom: 0.5em;
 }

 label{
  display: block;
  margin-bottom: 0.5em;
 }

input[type="number"]{
  width: 10%;
  padding: 0.5em;
  margin-bottom: 0.5em;
 }

 input[type="submit"]{
  background-color: #0066cc;
  border: none;
  color: white;
  padding: 0.7em;
  margin-bottom: 1.7em;
  cursor: pointer;
 }

 input[type="submit"]:hover{
  background-color: #333;
 }
 </style>

</head>
<body>
    <h1>Formulário de IMC</h1>
    <?php
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $peso = str_replace(',', '.', $_POST['peso']);
        $altura = str_replace(',', '.', $_POST['altura']);

        $imc = $peso / ($altura * $altura);

        if ($imc < 17) {
            $situacao = "Muito abaixo do peso";
        } elseif ($imc >= 17 && $imc <= 18.49) {
            $situacao = "Abaixo do peso";
        } elseif ($imc >= 18.5 && $imc <= 24.99) {
            $situacao = "Peso normal";
        } elseif ($imc >= 25 && $imc <= 29.99) {
            $situacao = "Acima do peso";
        } elseif ($imc >= 30 && $imc <= 34.99) {
            $situacao = "Obesidade I";
        } elseif ($imc >= 35 && $imc <= 39.99) {
            $situacao = "Obesidade II (severa)";
        } else {
            $situacao = "Obesidade III (mórbida)";
        }

        echo "IMC: " . number_format($imc, 2, ',', '') . "<br>";
        echo "Situação: $situacao";
    } else {
        ?>
        <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">
            <label for="peso">Peso (em kg):</label>
            <input type="number" id="peso" name="peso" required><br>
            
            <label for="altura">Altura (em m):</label>
            <input type="number" id="altura" name="altura" required><br>
            
            <input type="submit" class="btn btn-outline-primary" value="Calcular IMC">
        </form>
        <?php
    }
    ?>
</body>
</html>