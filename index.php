<!DOCTYPE html>
<html lang="en">
<head>
    <?php session_start();?>
    <meta charset="UTF-8">
    <title>Imobiliaria</title>
    <link rel="stylesheet" href="Style.css">
   
        
</head>
<body>
    <header class="col-12">
    <?php
            if(!isset($_SESSION['logado']) || $_SESSION['logado']!=TRUE){
				header("Location:Login.php");
			}else{
				echo "Olá, ".$_SESSION['nome'];
			}
	?><br>
     <?php 
        if (isset($_COOKIE['contador'])){
            $c =$_COOKIE['contador'];
            $c++;
            echo 'Obrigado pela visita número '.$c;

            setcookie('contador',$c,time()+3600);
        }else{
            echo 'ola meu amigo!';
            setcookie('contador',1,time()+3600);
        }
        ?>
    </header>
    <nav class="col-2">
        <ul>
            <li><a target="conteudo" href="Atende.php">Atender</a></li>
            <li><a target="conteudo" href="Contactar.php">Contactar</a></li>
            <li><a target="conteudo" href="Corretor.php">Cadastrar Corretor</a></li>
            <li><a target="conteudo" href="Imovel.php">Cadastrar Imovel</a></li>
            <li><a target="conteudo" href="Inquilino.php">Cadastrar Inquilino</a></li>
            <li><a target="conteudo" href="Proprietario.php">Cadastrar Proprietário</a></li>
        </ul> 
    </nav>
    <section class="col-8">
            <iframe name="conteudo"></iframe>
    </section>
    <aside class="col-2">
        <ul>
            <li><a target="conteudo" href="ListarAtendente.php">Listar Atendente</a></li>
            <li><a target="conteudo" href="ListarContactar.php">Listar Contactar</a></li>
            <li><a target="conteudo" href="ListarCorretor.php">Listar Corretor</a></li>
            <li><a target="conteudo" href="ListarImovel.php">Listar Imovel</a></li>
            <li><a target="conteudo" href="ListarInquilino.php">Listar Inquilino</a></li>
            <li><a target="conteudo" href="ListarProprietario.php">Listar Proprietario</a></li>
            <li><a target="conteudo" href="listaaniversario.php">Listar Aniversário</a></li>
        </ul>
    </aside>
    <footer class="col-12"> 
    <h1>PROJETO FINAL FELIPE, LUAN, MURILO, WEBLEY</h1>
    <a href="Login.php">Sair</a>
    </footer>
</body>
</html> 