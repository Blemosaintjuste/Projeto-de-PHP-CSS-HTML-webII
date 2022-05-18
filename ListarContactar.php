<!DOCTYPE html>
<html lang="en">
    <head>
        <?php include 'connection.php';    ?>
        <meta charset="UTF-8">
        <title>Listar Contatos</title>
    <link rel="stylesheet" href="style.css">
        
    </head>
    <body>
<div class="conteiner">
            <h1>Listar contatos</h1>
            <table border="1">
                <tr>
                    <th>ID</th><th>Data de contato</th><th>CPF Proprietário</th><th>CPF Corretor</th>
                </tr>
                <?php
                    $sql="SELECT id,dataContato,CPF_p,CPF_c FROM contactar";
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