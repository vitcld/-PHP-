<?php
    require_once "formEntradaScript.php";

    if (isset($_POST['nome']) && isset($_POST['salario']) && isset($_POST['tempoDeCasa'])) {
        $nome = $_POST['nome'];
        $salario = $_POST['salario'];
        $tempoDeCasa = $_POST['tempoDeCasa'];

        if ($tempoDeCasa >= 5) {
            $percentualBonus = 20;
        } else {
            $percentualBonus = 10;
        }

        $valorBonus = $salario * ($percentualBonus / 100);
        $salarioComBonus = $salario + $valorBonus;

        echo "<h1>Resultado</h1>";
        echo "<h2>Nome: $nome</h2>";
        echo "<h2>Bônus: R$ $valorBonus</h2>";
        echo "<h2>Salário total: R$ $salarioComBonus</h2>";
    }
?>
