<?php
	session_start();
	include 'connection.php';
	$sql="SELECT usuario,senha,nome FROM usuario";
	$resultado=$conn->query($sql);
	$tabela=$resultado->fetchAll(PDO::FETCH_ASSOC);
	$msg=FALSE;
	$nome= "";
	foreach($tabela as $login){
		//echo "<br>eu informei ".$_POST['usuario'].". e ".$_POST['senha'];
		//echo "<br>o banco tem ".$login['usuario']." e ".$login['senha'];
		if($login['usuario']==$_POST['usuario'] && $login['senha']==sha1($_POST['senha'])){
			$msg=TRUE;
			$nome= $login['nome'];
			break;
		}
	}
	if($msg==TRUE){
		$_SESSION['logado']=TRUE;
		$_SESSION['nome']=$nome;
		header("Location:index.php");
	}else{
		header("Location:login.php");
	}
?>