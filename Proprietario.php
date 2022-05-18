<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<form method="post" action="#">
<fieldset id="proprietario">
        <legend>Proprietário</legend>
        <input type="text" name="cpf" placeholder="cpf"><br>
        <input type="text" name="nome" placeholder="Nome"><br>
        <input type="date" name="dataNascimento"><br>
        <hr style="width: 0%;">
        <input type="submit" value="Salvar" name="salvar" id="salvar">
    </fieldset>
</form>
<?php
    if (isset($_POST['salvar'])){
		$cpf=$_POST['cpf'];
        $nome=$_POST['nome'];
        $dataNascimento=$_POST['dataNascimento'];
        include 'connection.php';
        $sql="INSERT INTO proprietario(CPF,nome,data_Nascimento) 
            VALUE(:CPF,:nome,:data_Nascimento)";
        $stmt=$conn->prepare($sql);
        $stmt->bindParam(':nome',$nome,PDO::PARAM_STR);
        $stmt->bindParam(':CPF',$cpf,PDO::PARAM_STR);
        $stmt->bindParam(':data_Nascimento',$dataNascimento,PDO::PARAM_STR);
        $resultado=$stmt->execute();
        if(!$resultado){
            var_dump($stmt->errorInfo());
            exit;    
        }else{
            echo $stmt->rowCount()."linhas inseridas";
        }
    }
?>
</body>
</html>