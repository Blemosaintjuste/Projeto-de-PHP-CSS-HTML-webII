<!DOCTYPE html>
<html lang="en">
    <head>
        <?php include 'connection.php';    ?>
        <meta charset="UTF-8">
        <title>Listar Proprietario</title>
    <link rel="stylesheet" href="style.css">
        
    </head>
    <body>
<div class="conteiner">
            <h1>Listar Proprietario</h1>
            <table border="1">
                <tr>
                    <th>Nome</th><th>CPF</th><th>Data de Nascimento</th>
                </tr>
                <?php
                    $sql="SELECT CPF,nome,data_Nascimento FROM proprietario";
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