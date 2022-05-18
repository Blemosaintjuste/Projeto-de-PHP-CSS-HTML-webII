<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Intervalo de data</title>
    <style>
        body{
            background-color: #F5DEB3;
        }
        #form{
            width:  16%;
        }
        #calcular{
            background-color: #B0E0E6;
        }
    </style>
</head>
<body>
    <form action="#" method="post">
        <fieldset id="form">
            <legend>Intervalo de data</legend>
            <input type="date" name="data">
            <input type="date" name="data2">
            <hr style="width: 0;">
            <input type="submit" value="Calcular" name="calcular" id="calcular">
        </fieldset>
    </form>

    <?php
    if (isset($_POST['calcular'])){
        $data = $_POST['data'];
        $data2 = $_POST['data2'];

        $primeiraData  = new DateTime($data);
        $segundaData = new DateTime($data2);
        $intervalo = $primeiraData->diff($segundaData);
        echo $intervalo->y . " anos, "
        . $intervalo->m." meses e "
        .$intervalo->d." dias";
   
        echo "\n";

        echo $intervalo->days . " dias ";
        $m=$intervalo->days;
        echo "<br>".(int)($m/30);
    }
    ?>
</body>
</html>