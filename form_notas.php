<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Formulário de Notas</title>
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
            <input type="text" id="nota1" name="nota1" min="0" max="10" step="0.1" required><br>
            
            <label for="nota2">Nota 2:</label>
            <input type="text" id="nota2" name="nota2" min="0" max="10" step="0.1" required><br>
            
            <input type="submit" value="Calcular Média">
        </form>
        <?php
    }
    ?>
</body>
</html>