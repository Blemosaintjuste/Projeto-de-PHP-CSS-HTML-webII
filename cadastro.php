<html>
<head>
    <?php include 'connection.php';?>
	<meta charset="utf-8">
    <link rel="stylesheet" href="Style1.css">
</head>
<body>
	<img src="https://www.lopes.com.br/blog/wp-content/uploads/2017/12/123.jpg">
	<form action="#" method="post" >
        <fieldset>
            <legend>Faça seu cadastro</legend>
                Nome:<input type="text" name="nome" class="login"><br>
                <hr>    
		        Usuario:<input type="text" name="user" class="login"><br>
                <hr>
		        Senha: <input type="password" name="senha" class="login"><br>
                <hr>
		        <input type="submit" name="cadastro" value="Cadastrar" id="logar" >
        </fieldset> 
	</form>
    <?php
        if(isset($_POST['cadastro'])){
            $nome = $_POST['nome'];
            $user = $_POST['user'];
            $senha = sha1($_POST['senha']);
            $sql="INSERT INTO usuario (usuario,senha,nome)VALUE(:usuario,:senha,:nome)";
            $smtmt=$conn->prepare($sql);
            $smtmt->bindParam(':usuario',$user,PDO::PARAM_STR);
            $smtmt->bindParam(':senha',$senha,PDO::PARAM_STR);
            $smtmt->bindParam(':nome',$nome,PDO::PARAM_STR);
            $resultado=$smtmt->execute();
            if(!$resultado){
            var_dump($smtmt->errorInfo());
            exit;
            }else{
                header("Location:login.php");
            }
        }
    ?>
</body>
</html>