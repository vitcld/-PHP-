<?php
    require_once("includes/conectarBD.php");
    include_once 'includes/cabecalho.php';
    echo "Data/Hora Atual: ";
    require 'includes/data.inc';
?>
<div class="nav-bar-fixed">
    <nav>
        <div class="nav-wrapper blue lighten-1">
            <a href="#!" class="brand-logo">Menu de Opções</a>
            <a href="#" data-target="mobile-navbar" class="sidenav-trigger"><i class="material-icons">menu</i></a>
            <ul id="navbar-itens" class="right hide-on-med-and-down">
                <li><a href="formIncluirBolsas.php">Incluir</a>
                <li><a href="formAlterarBolsas.php">Alterar</a>
                <li><a href="formExcluirBolsas.php">Excluir</a>
                <li><a href="menuPesquisarBolsas.php">Pesquisar</a>
            </ul>
        </div>
    </nav>
<table width="60%" border="0" cellspacing="0" cellpadding="0" align="center">
    <tr>
        <td height="60"><div align="center"><font face="Arial" size="4"><b>Pesquisar por Modelo e Fabricante da Bolsa - Ipil</b></font></div></td>
    </tr>
</table>      
    <form method="POST" action="resultadoPesquisarTermosBolsas.php">
        <p><div align="left"><font face="Arial" size="2">
        <b>Selecione Código, Modelo ou Fabricante da Bolsa:<br>
        <select name="bolItemPesquisa">
            <option value="bolModelo"><b>Modelo</option>
            <option value="bolFabricante"><b>Fabricante</option>
            </select><br/><br/>
        <b>Digite um Termo Conforme Item Escolhido Acima:</br>
        <input name="bolTermoPesquisa" type="text" size="40"></br>
        <input type="submit" value="Pesquisar"></font></div><br>               
    </form>
    <p><div align="center"><font face="Arial" size="2">
    <p><div align="center"><font face="Arial" size="2">
    <b><a href='menuPesquisarBolsas.php'><b>Voltar Para o Menu Pesquisar Bolsa</a><br>
    <b><a href='index.php'>Voltar Para o Menu de Opções Gerenciamento de Bolsas</a><br>
<?php
    include_once 'includes/rodape.php';
?>
