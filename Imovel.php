<!DOCTYPE html>
<html lang="en">
<head>
<?php include 'connection.php';?>

    <meta charset="UTF-8">
    <title>Imovel</title>
</head>
<body>
<form method="post" action="#">
    <fieldset id="Imovel">
        <legend>Imovel</legend>
        <input type="text" name="cidade" placeholder="Cidade"><br>
        <input type="text" name="bairro" placeholder="Bairro"><br>
        <input type="text" name="rua" placeholder="Rua"><br>
        <input type="number" name="numero" placeholder="Nmero"><br>
        <input type="text" name="complemento" placeholder="Complemento"><br>
        <input type="text" name="cep" placeholder="Cep"><br>
        <input type="text" name="id" placeholder="ID"><br>
        <select name="CPF_p">
            <?php
                $sql="SELECT CPF, nome FROM proprietario";
                $resultado=$conn->query($sql);
                $tabela=$resultado->fetchAll(PDO::FETCH_ASSOC);
                foreach($tabela as $linha){
                    echo "<option value='".$linha['CPF']."'>".$linha['nome']."</option>";
                }
            ?>
        </select><br>
        <hr style="width: 0%;">
        <input type="submit" value="Salvar" name="salvar" id="salvar">
    </fieldset>
</form>
<?php
    if (isset($_POST['salvar'])){
        $cidade       =$_POST['cidade'];
        $bairro    =$_POST['bairro'];
        $rua  =$_POST['rua'];
        $numero   =$_POST['numero'];
        $complemento   =$_POST['complemento'];
        $cep   =$_POST['cep'];
        $id   =$_POST['id'];
        $CPF_p  =$_POST['CPF_p'];
        $sql="INSERT INTO imovel(id,cidade,bairro,rua,numero,complemento,CEP,CPF_p)
        VALUE(:id,:cidade,:bairro,:rua,:numero,:complemento,:CEP,:CPF_p)";
        $smtmt=$conn->prepare($sql);
        $smtmt->bindParam(':cidade',$cidade,PDO::PARAM_STR);
        $smtmt->bindParam(':bairro',$bairro,PDO::PARAM_STR);
        $smtmt->bindParam(':rua',$rua,PDO::PARAM_STR);
        $smtmt->bindParam(':numero',$numero,PDO::PARAM_INT);
        $smtmt->bindParam(':complemento',$complemento,PDO::PARAM_STR);
        $smtmt->bindParam(':CEP',$cep,PDO::PARAM_STR);
        $smtmt->bindParam(':id',$id,PDO::PARAM_STR);
        $smtmt->bindParam(':CPF_p',$CPF_p,PDO::PARAM_STR);
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