<!DOCTYPE html>
<html lang="en">
    <head>
        <?php include 'connection.php';    ?>
        <meta charset="UTF-8">
        <title>Listar Imóvel</title>
    <link rel="stylesheet" href="style.css">
        
    </head>
    <body>
<div class="conteiner">
            <h1>Listar Imóvel</h1>
            <table border="1">
                <tr>
                <th>ID</th><th>Cidade</th><th>Bairro</th><th>Rua</th><th>Numero</th><th>Complemento</th><th>CEP</th><th>CPF Proprietario</th>
                </tr>
                <?php
                    $sql="SELECT id,cidade,bairro,rua,numero,complemento,CEP,CPF_p FROM imovel";
                    $resultado=$conn->query($sql);
                    $tabela=$resultado->fetchAll(PDO::FETCH_ASSOC);
                    foreach($tabela as $linha){
                        echo "<tr>";
                        foreach($linha as $coluna){
                        echo "<td>".$coluna."</td>";
                    }
                        echo "</tr>";
                    }
                ?>
            </table>
</div>      
    </body>
</html>