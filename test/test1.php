<?php

    
    $dateDebut = "21/03/2018 20:10:00";
    $dateDebut = explode(" ", $dateDebut);
    $dateDebut = implode('-', array_reverse(explode('/', $dateDebut[0]))).' '.$dateDebut[1];
    echo $dateDebut;