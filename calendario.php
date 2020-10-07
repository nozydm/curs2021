<?php
    $dia = date('d');
    $ano = date('Y');
    $mesn = date('m');
    $diasmes = date('t');
    $semana = array("lu","ma","mi","ju","vi","sa","do");
    $mesp = array("enero","febrero","marzo","abril","mayo","junio","julio","agosto","septiembre","octubre","noviembre","diciembre");
    //marcamos el mes en el que estamos
    echo ("mes " . $mesp[$mesn-1] . " ");
    echo ("dia " . $dia . " ");
    echo ("año " . $ano . '<br>');
    //con este for ponermos los dias de las semana
    for ($i = 0; $i < 7; $i++){
        echo ('<tr>' . $semana[$i] . "   " . '</tr>');
    }
    echo ('<br>');
    for ($c = 1 ; $c < $diasmes ; $c++){
        if ($c == $dia){
            echo ("<b>$c</b>" . " ");
        }
        elseif ($c % 7 ==0){
            echo ($c . " ");
            echo ('<br>');
        }
        else{
            echo ($c . " ");
        }
    }