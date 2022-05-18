<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inquilino</title>
    <?php include 'connection.php';?>
</head>
<body>
<form method="post" action="#">
<fieldset id="Contactar">
        <legend>Inquilino</legend>
        <input type="text" name="cpf" placeholder="cpf"><br>
        <input type="text" name="nome" placeholder="Nome"><br>
        <input type="date" name="dataNascimento"><br>
        <input type="text" name="salario" placeholder="Salario"><br>
        <select name="ID">
        <?php
                $sql="SELECT id,rua,numero FROM imovel";
                $resultado=$conn->query($sql);
                $tabela=$resultado->fetchAll(PDO::FETCH_ASSOC);
                foreach($tabela as $linha){
                    echo "<option value='".$linha['id']."'>".$linha['rua']." ".$linha['numero']."</option>";
                }
            ?>
        </select><br>
        
        <hr style="width: 0%;">
        <input type="submit" value="Salvar" name="salvar" id="salvar">
    </fieldset>
</form>
<?php
    if (isset($_POST['salvar'])){
		$cpf=$_POST['cpf'];
        $nome=$_POST['nome'];
        $dataNascimento=$_POST['dataNascimento'];
        $salario=$_POST['salario'];
        $ID=$_POST['ID'];
        
        $sql="INSERT INTO inquilino(CPF,nome,dataNascimento,salario,id_imovel) 
            VALUE(:CPF, :nome, :dataNascimento, :salario, :id_imovel)";
        $stmt=$conn->prepare($sql);
        $stmt->bindParam(':nome',$nome,PDO::PARAM_STR);
        $stmt->bindParam(':CPF',$cpf,PDO::PARAM_STR);
        $stmt->bindParam(':dataNascimento',$dataNascimento,PDO::PARAM_STR);
        $stmt->bindParam(':salario',$salario,PDO::PARAM_STR);
        $stmt->bindParam(':id_imovel',$ID,PDO::PARAM_STR);
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