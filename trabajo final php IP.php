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
//punto d, devuelve temp dado mes y año
function devuelveTemp($matrizTemPrin, $anio, $mes){
    $fila = $mes - 1;
    $colum = $anio - 2014;

    $temp = $matrizTemPrin[$fila][$colum];
  return $temp;  
} //a revisar
    
//punto e, devuelve las doce temp de un año determinado por el usuario
function tempMensual($anio, $mes, $matrizTemPrin){
    $colum = $anio - 2014;
    $cantElementos = count($matrizTemPrin[$colum]) ;
    for($mes = 0; $mes < $cantElementos; $mes++){
        echo $matrizTemPrin[$colum][$mes].("\n"); 
    }
}// a revisar

//punto f, muestra para un mes determinado las temp de todos los años y el promedio
function tempAnual ($anio, $mes, $matrizTemPrin){
    $fila = $mes - 1; 
    $suma = 0;
    $contPromedio = 0;
    for ($anio = 0; $anio < count($matrizTemPrin); $anio++){
        echo (2014 + $anio). (":") .$matrizTemPrin[$anio][$fila] .("ºC\n");
    $suma +  $matrizTemPrin[$anio][$fila];
    $contPromedio = 0;
    }

    $promedio = $suma/$contPromedio;
    echo "Promedio: " . round($promedio, 2) . ("°C\n"); 
}

//punto g, halla la temp máx. y mín. dado mes y año.
/**@param int $anio, $mes, $matrizTemPrin
 * @return int */

 function tempMaxMin($mes, $anio, $matrizTemPrin){
    $mes = $mes - 1;
    $anio = $anio - 2014;
    $tempMax = $matrizTemPrin[0][0];
    $tempMin = $matrizTemPrin [0][0];
    $mesMax = 1;
    $mesMin = 1;
        for($anio = 0; $anio < 10; $anio++){
            for($mes = 0; $mes < 12; $mes++){
                if($matrizTemPrin[$anio][$mes] > $tempMax){
                    $tempMax = $matrizTemPrin[$anio][$mes]; 
                    $mesMax = $mes + 1;
                }
                    if($matrizTemPrin[$anio][$mes] < $tempMin){
                        $tempMin = $matrizTemPrin[$anio][$mes];
                        $mesMin = $mes + 1;
                    }    
            }

         }
    echo "La temperatura máxima: ".$tempMax ."°C".("\n");
    echo "La temperatura mínima: ".$tempMin."°C".("\n");     
 }
 //
 function tempePrimavera ($matrizTemPrin){
    $primavera = [];
    for ($anio = 0; $anio > 10; $anio++){
        $primavera[$anio] = [$matrizTemPrin[$anio][9], $matrizTemPrin[$anio][10], $matrizTemPrin[$anio][11]]; 
    }
    return $primavera;
 }

 //función para obtener la matriz de invierno (jul-ago-sep) ultimos 5 años
/**@param int $matrizTemPrin
 * @return int
 */
 function tempInvierno($matrizTemPrin){
    $invierno = [];
    for($anio = 5; $anio < 10; $anio++){
        $invierno[$anio -5] = [$matrizTemPrin[$anio][6], $matrizTemPrin[$anio][7], $matrizTemPrin[$anio][8]];

    }
    return $invierno;
 }



$pi = matrizTemp(); 
columnaMatriz($pi);