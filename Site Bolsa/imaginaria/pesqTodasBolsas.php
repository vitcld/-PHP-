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
        <td height="60"><div align="center"><font face="Arial" size="4"><b>Gerenciamento de Bolsas</b></font></div></td>
    </tr>
    </table>
<?php
     //A formatação do campo cliDtNascimento, para retornar a data no formato dd/MM/yyyy
     $sqlBolsas = mysqli_query($conexao, "SELECT bolID, bolModelo, bolFabricante FROM bolsas".
     //Ordena pelo número do código da bolsa
     " ORDER BY bolID") or die ("Não foi possível realizar a consulta.");
?>
<?php
     //Se encontrar algum registro na tabela
     if(mysqli_num_rows($sqlBolsas) > 0)
     {
?>
        <table width="100%" border="0" cellspacing="1" cellpadding="0" align="center">
        <tr>
            <td colspan="15"><div align="center"><font face="Arial" size="2"><b>Bolsas Cadastrados</font></b></font></div></td>
        </tr>
        <tr>
        <td colspan="15"><div align="center"><font face="Arial" size="2"><b>Utilize as Teclas Ctlr+F para Encontrar o Código ou Nome da Bolsa</font></b></font></div></td>
        </tr>
        <tr>
            <td width="10%"><div align="center"><b><font face="Arial" size="2">Modelo</font></b></div></td>            
            <td width="10%"><div align="center"><b><font face="Arial" size="2">Fabricante</font></b></div></td>
        </tr>
<?php
        //Lista os dados da tabela enquanto exisitir
        while($arrayCliente = mysqli_fetch_array($sqlBolsas))
        {
?>
        <tr>
            <td width="10%" height="25"><b><font face="Arial" size="2"><?php echo $arrayCliente['bolID'];?></font></td>            
            <td width="20%" height="25"><b><font face="Arial" size="2"><?php echo $arrayCliente['bolModelo'];?></font></td>
            <td width="10%" height="25"><b><font face="Arial" size="2"><?php echo $arrayCliente['bolFabricante'];?></font></td>
        </tr>
<?php
        //Fecha a execução do comando mysqli_fetch_array
        }
?>
        </table>
<?php
     }//Fecha a execução do comando mysqli_num_rows > 0
     else
     {
         echo "<br><br><div align=center><font face=Arial size=2>Desculpe, mas não foram encontrados nenhuma bolsa<br><br></font></div>";
     }
?>
     <br><div align="center"><font face="Arial" size="2">
     <b><a href='menuPesquisarBolsas.php'><b>Voltar Para o Menu Pesquisar Bolsas</a><br>     
     <a href='formAlterarBolsas.php'><b>Voltar Para Alteração de Bolsas</a><br>
     <a href='formExcluirBolsas.php'><b>Voltar Para Exclusão de Bolsas</a><br>
     <a href='index.php'><b>Voltar para o menu de Opções Gerenciamento de Bolsas</a><br>
<?php
    include_once 'includes/rodape.php';
?>
