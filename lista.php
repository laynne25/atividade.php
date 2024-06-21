<!DOCTYPE html>
<html>
<head>
    <title>Calculadora PHP</title>
</head>
<body>
    <h2>Calculadora PHP</h2>
    <form method="post" action="">
        <label for="num1">Digite o primeiro número:</label><br>
        <input type="text" id="num1" name="num1"><br>
        <label for="num2">Digite o segundo número:</label><br>
        <input type="text" id="num2" name="num2"><br><br>
        <input type="submit" value="Calcular">
    </form>
    

    <h2>Classificação de Triângulo</h2>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
        <label for="lado1">Lado 1:</label>
        <input type="number" id="lado1" name="lado1" required><br><br>

        <label for="lado2">Lado 2:</label>
        <input type="number" id="lado2" name="lado2" required><br><br>

        <label for="lado3">Lado 3:</label>
        <input type="number" id="lado3" name="lado3" required><br><br>

        <button type="submit">Classificar</button>
    </form>
    

     <h2>Identificar Mês</h2>
    <form method="post">
        <label for="numero">Digite um número entre 1 e 12:</label><br>
        <input type="number" id="numero" name="numero" min="1" max="12"><br><br>
        <input type="submit" value="Identificar">
    </form>
   
   <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $num1 = $_POST['num1'];
        $num2 = $_POST['num2'];

        
        function calcular_adicao($num1, $num2) {
            $soma = $num1 + $num2;

            if ($soma > 20) {
                $soma += 8;
            } else {
                $soma -= 5;
            }

            return $soma;
        }

        if (!empty($num1) && !empty($num2)) {
            $resultado = calcular_adicao($num1, $num2);
            echo "<br>O resultado é: " . $resultado;
        } else {
            echo "Por favor, preencha ambos os números.";
        }
    }
        //triangulo
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $lado1 = $_POST['lado1'];
        $lado2 = $_POST['lado2'];
        $lado3 = $_POST['lado3'];

        function classificarTriangulo($l1, $l2, $l3) {
            if ($l1 == $l2 && $l2 == $l3) {
                return "Equilátero";
            } elseif ($l1 == $l2 || $l1 == $l3 || $l2 == $l3) {
                return "Isósceles";
            } else {
                return "Escaleno";
            }
        }

        if ($lado1 + $lado2 > $lado3 && $lado1 + $lado3 > $lado2 && $lado2 + $lado3 > $lado1) {
            $classificacao = classificarTriangulo($lado1, $lado2, $lado3);
            echo "<p>Os lados $lado1, $lado2 e $lado3 formam um triângulo $classificacao.</p>";
        } else {
            echo "<p>Os lados fornecidos não formam um triângulo válido.</p>";
        }
    }

    //par ou impar

    if(isset($_POST['numero'])) {
        $numero = $_POST['numero'];

        // Array associativo para mapear números de meses para seus nomes
        $meses = array(
            1 => "Janeiro",
            2 => "Fevereiro",
            3 => "Março",
            4 => "Abril",
            5 => "Maio",
            6 => "Junho",
            7 => "Julho",
            8 => "Agosto",
            9 => "Setembro",
            10 => "Outubro",
            11 => "Novembro",
            12 => "Dezembro"
        );

        // Verifica se o número está dentro do intervalo
        if($numero >= 1 && $numero <= 12) {
            echo "O número $numero corresponde ao mês de " . $meses[$numero] . ".";
        } else {
            echo "Não existe mês correspondente para o número $numero.";
        }
    }

    ?>
</body>
</html>