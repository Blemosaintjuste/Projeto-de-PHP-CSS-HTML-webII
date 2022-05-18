<!DOCTYPE html>
<html lang="en">
    <head>
        <?php include 'connection.php';    ?>
        <meta charset="UTF-8">
        <title>Listar Aniversário</title>
    <link rel="stylesheet" href="style.css">
        
    </head>
    <body>
<div class="conteiner">
            <h1>Listar Aniversário</h1>
            <table border="1">
                <tr>
                    <th>Nome</th><th>Data de atendimento</th><th>Quantos anos</th>
                </tr>
                <?php 
                $sql="SELECT nome, dataNascimento,
                floor(datediff(curdate(),dataNascimento)/365)
                FROM inquilino where extract(month from dataNascimento)  = extract(month from curdate())  and
                extract(day from dataNascimento) = extract(day from curdate())";
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