<?php

    print_r ("valor de texto= ". $_REQUEST["mytext"]. '<br>');
    if(isset($_REQUEST["mycheckbox"])){
        print_r($_REQUEST["mycheckbox"]);
    }
    print_r ("valor de radio= ". $_REQUEST["myradio"]. '<br>');
    print_r ("valor de select= ". $_REQUEST["myselect"]. '<br>');
    print_r ("valor de texto= ". $_REQUEST["mytextarea"]. '<br>');
?>