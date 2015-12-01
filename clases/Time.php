<?php

class Time {
    function contarDias($f1, $f2){
        $segundos=strtotime($f2) - strtotime($f1);
        $diferencia_dias=intval($segundos/60/60/24);
        return $diferencia_dias;
    }
    
}
