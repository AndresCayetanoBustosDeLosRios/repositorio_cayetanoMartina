<?php
function matrizTemp(){
$matrizTemPrin = array(
    array(30,28,26,22,18,12,10,14,17,20,25,29),
    array(33,30,27,22,19,13,11,15,18,21,26,31),
    array(34,32,29,21,18,14,12,16,18,21,27,32),
    array(33,31,28,22,18,13,11,14,17,22,26,31),
    array(32,30,28,22,17,12, 9,13,16,20,24,30),
    array(32,20,27,23,19,14,12,11,17,23,25,29),
    array(31,29,28,21,19,13,10,12,16,22,27,29),
    array(30,28,26,20,16,12,11,13,17,21,28,30),
    array(31,29,27,21,17,12,11,15,18,22,26,30),
    array(32,30,27,20,16,13,13,15,19,23,28,31)
);
return $matrizTemPrin;
}
function matrizManual(){
    $anio = 0; $mes = 0;
    for ($anio = 0; $anio < 10; $anio++){
        for ($mes=0; $mes<12; $mes++){
        echo ("ingrese una temperatura mayor -50 o menor a 50");
        $temperatura = trim(fgets(STDIN));
        $matrizTemPrin [$anio] [$mes] = $temperatura;

        }
    }
 return $matrizTemPrin;
} 
function columnaMatriz($arrayprinc){
    $anio = 0; $mes = 0;
    for ($anio = 0; $anio < 10; $anio++){
        for ($mes = 0; $mes < 12; $mes++){
        echo(" ").$arrayprinc [$anio] [$mes].("\n");
      } 
    }
}
    
$pi = matrizTemp(); 
columnaMatriz($pi);