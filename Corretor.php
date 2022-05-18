<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Corretor</title>
    <?php include 'connection.php';?>
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
        $cpf       =$_POST['cpf'];
        $nome    =$_POST['nome'];
        $dataNascimento =$_POST['dataNascimento'];

        $sql="INSERT INTO corretor(CPF,nome,data_Nascimento)
        VALUE(:CPF,:nome,:data_Nascimento)";
        $smtmt=$conn->prepare($sql);
        $smtmt->bindParam(':nome',$nome,PDO::PARAM_STR);
        $smtmt->bindParam(':CPF',$cpf,PDO::PARAM_STR);
        $smtmt->bindParam(':data_Nascimento',$dataNascimento,PDO::PARAM_STR);
        $resultado=$smtmt->execute();
        if(!$resultado){
            var_dump($smtmt->errorInfo());
            exit;
        }else{
            echo $smtmt->rowCount(). 'linhas inseridas';
        }
    }

?>
</body>
</html>