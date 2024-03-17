<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Formulário de Notas</title>
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

 input[type="text"]{
  width: 20%;
  padding: 0.5em;
  margin-bottom: 0.5em;
 }
 
 input[type="number"]{
  width: 12%;
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
    <h1>Formulário de Notas</h1>
    <?php
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $nome = $_POST['nome'];
        $nota1 = str_replace(',', '.', $_POST['nota1']);
        $nota2 = str_replace(',', '.', $_POST['nota2']);

        $media = ($nota1 + $nota2) / 2;

        if ($media < 4) {
            $situacao = "Reprovado";
        } elseif ($media >= 4 && $media < 6) {
            $situacao = "Exame Final";
        } else {
            $situacao = "Aprovado";
        }

        echo "Nome do Aluno: $nome<br>";
        echo "Média: $media<br>";
        echo "Situação: $situacao";
    } else {
        ?>
        <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">
            <label for="nome">Nome do Aluno:</label>
            <input type="text" id="nome" name="nome" required><br>
            
            <label for="nota1">Nota 1:</label>
            <input type="number" id="nota1" name="nota1" min="0" max="10" step="0.1" required><br>
            
            <label for="nota2">Nota 2:</label>
            <input type="number" id="nota2" name="nota2" min="0" max="10" step="0.1" required><br>
            
            <input type="submit" value="Calcular Média">
        </form>
        <?php
    }
    ?>
</body>
</html>