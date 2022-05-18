<!DOCTYPE html>
<html lang="en">
    <head>
        <?php include 'connection.php';    ?>
        <meta charset="UTF-8">
        <title>Listar Corretor</title>
    <link rel="stylesheet" href="Style.css">
        
    </head>
    <body>
<div class="conteiner">
            <h1>Listar Corretor</h1>
            <table border="1">
                <tr>
                    <th>CPF</th><th>Nome</th><th>Data Nascimento</th>
                </tr>
                <?php
                    $sql="SELECT CPF,nome,data_Nascimento FROM corretor";
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