<?php 
        if (isset($_COOKIE['contador'])){
            $c =$_COOKIE['contador'];
            $c++;
            echo 'Obrigado pela visita número '.$c;

            setcookie('contador',$c,time()+3600);
        }else{
            echo 'ola meu amigo!';
            setcookie('contador',1,time()+3600);
        }
        ?>