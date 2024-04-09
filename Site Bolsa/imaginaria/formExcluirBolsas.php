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
          <td height="60"><div align="center"><font face="Arial" size="4"><b>Excluir Dados de Bolsas</b></font></div></td>
      </tr>
      </table>      
<?php
     if (!isset($_POST["bolID"])&& !isset($_POST["enviar"]))
     {
?>
     <form method="POST" action="<?php echo $_SERVER["PHP_SELF"];?>">
           <p>Modelo: <input type="text" name="bolID" size="10">
           <input type="submit" value="Excluir Dados do Bolsa" name="excluir"></p>
           <div align="left"><font face="Arial" size="2"><b>Não Lembra o Código?<a href='pesqTodosBolsas.php'> Clique Aqui </a><br></font></div>
     </form>
<?php
     }
     //Vai buscar dados do Bolsa
     else if(!isset($_POST["enviar"])) 
     {
        $bolID = $_POST["bolID"];
       $consulta = mysqli_query($conexao, "SELECT bolID, bolModelo, bolFabricante FROM Bolsas WHERE bolID = '$bolID'");          
        //obtem a resposta do Select executado acima
        $linha = mysqli_num_rows($consulta);
     if ($linha == 0) //verifica quantas linhas teve a query executada, se for igual a zero o Bolsa nao foi encontrado
     {
          echo "Bolsa não encontrada $bolID";
     }
     else
     {
          echo "<div><font face=Arial size=4><b>Bolsa Encontrada:</b></font></div>";
          //seta a linha de campoBolsa da tabela Bolsas e depois coloca cada campo em uma variavel
          $campoBolsa = mysqli_fetch_row($consulta);          
          $bolModelo = $campoBolsa[1];
          $bolFabricante = $campoBolsa[2];   
?>
          <form method="POST" action="<?php echo $_SERVER["PHP_SELF"]; ?>">
          <table width="100%" border="0" cellspacing="1" cellpadding="0" align="center">
             <tr bgcolor="#6699CC">
                 <td colspan="15"><div align="center"><font face="Arial" size="2"><b><font color="#FFFFFF">Bolsas Cadastradas</font></b></font></div></td>
             </tr>                
                 <td width="5%"><div align="center"><b><font face="Arial" size="2">Modelo</font></b></div></td>                 
                 <td width="5%"><div align="center"><b><font face="Arial" size="2">Fabricante</font></b></div></td>
             </tr>
             <tr>
                 <td width="10%" height="25"><b><font face="Arial" size="2"><?php echo $bolID;?></font></td>                 
                 <td width="20%" height="25"><b><font face="Arial" size="2"><?php echo $bolModelo;?></font></td>                 
                 <td width="10%" height="25"><b><font face="Arial" size="2"><?php echo $bolFabricante;?></font></td>
             </tr>
          </table>
          <input type ="hidden" name="bolID" value="<?php echo $bolID;?>">
          <input type ="hidden" name="enviar" value="S">
          <input type ="submit" value="Deseja Realmente Excluir a Bolsa?" name="excluir"></p>
          </form>
<?php
          mysqli_close($conexao);
     }
     }
     else
     // Excluir Bolsa
     {
          $bolID = $_POST["bolID"];
          $deleta = mysqli_query($conexao, "DELETE FROM Bolsas WHERE bolID = '$bolID'");
          //O comando mysqli_affected_rows(), vai retornar a quantidade de linhas alteradas com o comando DELETE
          if (mysqli_affected_rows($conexao)>0)
          {
             echo "<p align='center'>Dados da Bolsa foram excluídos com sucesso!!!</p>";              
          }
          else
          {
              $erro=mysqli_error($conexao);
              echo "<p align='center'>Erro:$erro</p>";
          }
              mysqli_close($conexao);
          }
?>
          <p><div align="center"><font face="Arial" size="2">
          <p><div align="center"><font face="Arial" size="2">
          <b><a href='formExcluirBolsas.php'><b>Voltar Para Exclusão de Bolsas</a><br>
          <b><a href='index.php'>Voltar para o menu de Opções Gerenciamento de Bolsas</a><br>
<?php
    include_once 'includes/rodape.php';
?>
