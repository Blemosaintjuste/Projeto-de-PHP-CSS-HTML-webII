<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contactar</title>
    <?php include 'connection.php';?>
</head>
<body>
<form method="post" action="#">
<fieldset id="Contactar">
        <legend>Contactar</legend>
        <input type="date" name="data" placeholder="Data"><br>
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
        <select name="CPF_c">
        <?php
                $sql="SELECT nome,CPF FROM corretor";
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
        $data      =$_POST['data'];
        $id   =$_POST['id'];
        $CPF_p =$_POST['CPF_p'];
        $CPF_c =$_POST['CPF_c'];

        $sql="INSERT INTO contactar(id,dataContato,CPF_p,CPF_c)
        VALUE(:id,:dataContato,:CPF_p,:CPF_c)";
        $smtmt=$conn->prepare($sql);
        $smtmt->bindParam(':id',$id,PDO::PARAM_INT);
        $smtmt->bindParam(':dataContato',$data ,PDO::PARAM_STR);
        $smtmt->bindParam(':CPF_p',$CPF_p,PDO::PARAM_STR);
        $smtmt->bindParam(':CPF_c',$CPF_c,PDO::PARAM_STR);
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