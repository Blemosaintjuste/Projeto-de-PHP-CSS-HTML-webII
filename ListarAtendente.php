<!DOCTYPE html>
<html lang="en">
    <head>
        <?php include 'connection.php';    ?>
        <meta charset="UTF-8">
        <title>Listar Atender</title>
    <link rel="stylesheet" href="style.css">
        
    </head>
    <body>
<div class="conteiner">
            <h1>Listar Atender</h1>
            <table border="1">
                <tr>
                    <th>ID</th><th>Data de atendimento</th><th>CPF Inquilino</th><th>CPF Corretor</th>
                </tr>
                <?php
                    $sql="SELECT id,dataAtendimento,CPF_i,CPF_c FROM atender";
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