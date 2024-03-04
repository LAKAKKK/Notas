<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Formulário de IMC</title>
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
            <input type="text" id="peso" name="peso" required><br>
            
            <label for="altura">Altura (em m):</label>
            <input type="text" id="altura" name="altura" required><br>
            
            <input type="submit" value="Calcular IMC">
        </form>
        <?php
    }
    ?>
</body>
</html>