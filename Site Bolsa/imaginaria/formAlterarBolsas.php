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
        <td height="60"><div align="center"><font face="Arial" size="4"><b>Alterar Dados da Bolsa</b></font></div></td>
        </tr>
    </table>
    <?php
        if (!isset($_POST["bolID"])&& !isset($_POST["enviar"]))
        {
    ?>
        <form method="POST" action="<?php echo $_SERVER["PHP_SELF"];?>">
            <p>Modelo da Bolsa: <input type="text" name="bolID" size="10">
            <input type="submit" value="Alterar Dados do Bolsa" name="alterar"></p>
            <div align="left"><font face="Arial" size="2"><b>Não Lembra o Código?<a href='pesqTodosBolsas.php'> Clique Aqui </a><br/></font></div>
        </form>
        <?php
        }
        //Buscará os dados do Bolsa
        else if(!isset($_POST["enviar"]))
        {
            $bolID = $_POST["bolID"];
            $consulta = mysqli_query($conexao, "SELECT bolID, bolModelo, bolFabricante FROM Bolsa WHERE bolID = '$bolID'");
            //obtém a resposta do Select executado acima
            $linha = mysqli_num_rows($consulta);
        if ($linha == 0) //verifica quantas linhas teve a query executada e se for igual a zero, o Bolsa não foi encontrada
        {
            echo "bolsa não encontrada $bolID";
        }
        else
        {
            echo "<div><font face=Arial size=4><b>Bolsa Encontrado:</b></font></div>";
            //seta a linha de campoBolsa da tabela Bolsas e depois, coloca cada campo em uma variável.
            $campoBolsa = mysqli_fetch_row($consulta);            
            $bolModelo = $campoBolsa[1];
            $bolFabricante = $campoBolsa[2];
        ?>
            <form name="formBolsas" method="POST" action="<?php echo $_SERVER["PHP_SELF"]; ?>">
            <table width="100%" border="0" cellspacing="1" cellpadding="0" align="center">
                <tr>
                    <td colspan="15"><div align="center"><font face="Arial" size="2"><b><font color="#FFFFFF">Bolsas Cadastradas</font></b></font></div></td>
                </tr>
                <tr>             
                    <td width="5%"><div align="center"><b><font face="Arial" size="2">Modelo</font></b></div></td>
                    <td width="5%"><div align="center"><b><font face="Arial" size="2">Fabricante</font></b></div></td>
                </tr>
                <tr>
                    <td width="10%" height="25"><b><font face="Arial" size="2"><?php echo $bolID;?></font></td>
                    <td width="20%" height="25"><b><font face="Arial" size="2"><input type="text" name="bolModelo" size="42" required value="<?php echo $bolModelo;?>"></font></td>
                    <td width="10%" height="25"><b><font face="Arial" size="2"><input type="email" name="bolFabricante" required value="<?php echo $bolFabricante;?>"></font></td>     
                </tr>
            </table>
            <input type ="hidden" name="bolID" value="<?php echo $bolID;?>">
            <input type ="hidden" name="enviar" value="S">
            <input type ="submit" value="Alterar Dados da Bolsa" name="alterar"></p>
            </form>
            <?php
                mysqli_close($conexao);
        }
        }
        else // alterar Bolsa
        {
            $bolID = $_POST["bolID"];
            $bolModelo = $_POST["bolModelo"];
            $bolFabricante = $_POST["bolFabricante"];
            $altera = mysqli_query($conexao, "UPDATE Bolsas SET bolModelo='$bolModelo', bolFabricante='$bolFabricante') WHERE bolID='$bolID'");
            //O comando mysqli_affected_rows( ) retornará a quantidade de linhas alteradas com o comando UPDATE
            if (mysqli_affected_rows($conexao) > 0)
            {
                echo "<p align='center'>Dados do Bolsa $bolModelo alterados com sucesso!!! Verifique abaixo a alteração feita.</p>";
                echo "<table width='100%' border='0' cellspacing='1' cellpadding='0' align='center'>";
                    echo "<tr>";
                    echo "</tr>";
                    echo "<tr>";
                        echo "<td width='20%'><div align='center'><b><font face='Arial' size='2'>Modelo</font></b></div></td>";
                        echo "<td width='10%'><div align='center'><b><font face='Arial' size='2'>Fabricante</font></b></div></td>";
                    echo "</tr>";
                    echo "<tr>";
                        echo "<td width='10%' height='25'><b><font face='Arial' size='2'>$bolID</font></td>";                        
                        echo "<td width='20%' height='25'><b><font face='Arial' size='2'>$bolModelo</font></td>";                        
                        echo "<td width='10%' height='25'><b><font face='Arial' size='2'>$bolFabricante</font></td>";
                    echo "</tr>";
                echo "</table>";
            }
            else
            {
                $erro=mysqli_error($conexao );
                echo "<p align='center'>Erro:$erro</p>";
            }
        mysqli_close($conexao);
    }
?>
    <p><div align="center"><font face="Arial" size="2"><b><a href='formIncluirBolsas.php'><b>Voltar para a Inclusão de Bolsa</a><br/>
    <b><a href='formAlterarBolsas.php'><b>Voltar para a Alteração de Bolsa</a><br/>
    <b><a href='formExcluirBolsas.php'><b>Voltar para a Exclusão de Bolsa</a><br/>
    <b><a href='menuPesquisarBolsas.php'><b>Voltar para a Pesquisa de Bolsa</a><br/>
    <b><a href='index.php'><b>Voltar para o menu de Opções Gerenciamento de Bolsa</a><br/>
<?php
    include_once 'includes/rodape.php';
?>
