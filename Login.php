<html>
<head>
	<?php 
	session_start();
    $_SESSION['logado']=FALSE;
	?>
	<meta charset="utf-8">
    <link rel="stylesheet" href="Style1.css">
</head>
<body>
	<img src="https://www.lopes.com.br/blog/wp-content/uploads/2017/12/123.jpg">
	<form action="validaLogin.php" method="post" >
        <fieldset>
            <legend>Faça seu login</legend>
		        Usuario:<input type="text" name="usuario" class="login"><br>
                <hr>
		        Senha: <input type="password" name="senha" class="login"><br>
				<hr>
		        <input type="submit" value="Logar" id="logar">

        </fieldset> 
	</form>
</body>
</html>