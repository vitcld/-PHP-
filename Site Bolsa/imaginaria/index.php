<?php
    include_once 'includes/cabecalho.php';
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
    <ul id="mobile-navbar" class="sidenav">
        <li><a href="formIncluirBolsas.php"><i class="material-icons left">assignment_turned_in</i>Incluir</a>
        <li><a href="formAlterarBolsas.php"><i class="material-icons left">done</i>Alterar</a>
        <li><a href="formExcluirBolsas.php"><i class="material-icons left">delete</i>Excluir</a>
        <li><a href="menuPesquisarBolsas.php"><i class="material-icons left">search</i>Pesquisar</a>
    </ul>
<div>
<div>
    <ul>
        <li class="row"><a href="formIncluirBolsas.php"><i class="material-icons left">assignment_turned_in</i>Incluir</a>
        <li class="row"><a href="formAlterarBolsas.php"><i class="material-icons left">done</i>Alterar</a>
        <li class="row"><a href="formExcluirBolsas.php"><i class="material-icons left">delete</i>Excluir</a>
        <li class="row"><a href="menuPesquisarBolsas.php"><i class="material-icons left">search</i>Pesquisar</a>
    </ul>        
</div>
<?php
    include_once 'includes/rodape.php';
?>
