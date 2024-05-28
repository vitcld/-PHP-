<?php
    include_once 'includes/cabecalho.php';
?>
<h5>Trabalho é Bom</h5>
    <form action="formSaidaScript.php" method="post">
        <input type="text" name="nome" required placeholder="Nome do funcionário">
        <input type="number" name="salario" required placeholder="Salário">
        <input type="number" name="tempoDeCasa" required placeholder="Tempo de casa (anos)">
        <input type="submit" value="Enviar">
    </form>
<?php
    include_once 'includes/rodape.php';
?>