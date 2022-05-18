<?php
  $semana = time() + (7 * 24 * 60 * 60);
  echo 'Agora:       '. date('d-m-Y') ."<br>";
  echo 'Proxima semana: '. date('d-m-Y', $semana) ."<br>";
  echo 'Proxima semana: '. date('d-m-Y', strtotime('+1 month')) ."<br>";
  $agora = new DateTime();
  var_dump ($agora);
 
  echo "<hr>";
 
 
echo "<br>".date('d/m/Y');
 
echo "<br>".date('Y');
 
$minha_data = '1975-02-03';
 
echo "<br>".date('H:i:s', strtotime($minha_data ));
 
echo "<br>".date('d/m/Y', strtotime($minha_data ));
echo "<hr>";
$date = date_create('1975-02-03 10:30:10', timezone_open('America/Sao_Paulo'));
echo date_format($date, 'Y/m/d H:i:s');

echo "<hr>";
$primeiraData  = new DateTime("1975-02-03");
$segundaData = new DateTime("2022-05-04");
$intervalo = $primeiraData->diff($segundaData);

echo $intervalo->y . " anos, "
    . $intervalo->m." meses e "
    .$intervalo->d." dias";
   
echo "\n";

echo $intervalo->days . " dias ";
$m=$intervalo->days;
echo "<br>".$m/30;
?>