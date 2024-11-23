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
function columnaMatriz($matrizTemPrin){
    $anio = 0; $mes = 0;
    for ($anio = 0; $anio < 10; $anio++){
        for ($mes = 0; $mes < 12; $mes++){
        echo(" ").$matrizTemPrin [$anio] [$mes].("\n");
      } 
    }
}
//punto d, devuelve temp dado mes y año
function devuelveTemp($matrizTemPrin, $anio, $mes){
    $fila = $mes - 1;
    $colum = $anio - 2014;

    $temp = $matrizTemPrin[$colum][$fila];
  return $temp;  
} //a revisar
    
//punto e, devuelve las doce temp de un año determinado por el usuario
function tempMensual($anio, $matrizTemPrin){
    $colum = $anio - 2014;
    $cantElementos = count($matrizTemPrin[$colum]) ;
    for($mes = 0; $mes < $cantElementos; $mes++){
        echo $matrizTemPrin[$colum][$mes].("\n"); 
    }
}// a revisar

//punto f, muestra para un mes determinado las temp de todos los años y el promedio
function tempAnual ($mes, $matrizTemPrin){
    $fila = $mes - 1; 
    $suma = 0;
    $contPromedio = 0;
    for ($anio = 0; $anio < count($matrizTemPrin); $anio++){
        echo (2014 + $anio). (":") .$matrizTemPrin[$anio][$fila] .("°C\n");
    $suma +  $matrizTemPrin[$anio][$fila];
    $contPromedio = 0;
    }

    $promedio = $suma/$contPromedio;
    echo "Promedio: " . round($promedio, 2) . ("°C\n"); 
}

//punto g, halla la temp máx. y mín. dado mes y año.
/**@param int $anio, $mes, $matrizTemPrin
 * @return int */

 function tempMaxMin($matrizTemPrin){
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
 function tempPrimavera ($matrizTemPrin){
    $primavera = [];
    for ($anio = 0; $anio < 10; $anio++){
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
function menuOpcion(){
    $matrizTemPrin = matrizTemp();
    do {
        echo "\nMenú de opciones:\n";
        echo "1. Carga automática de temperaturas\n";
        echo "2. Carga manual de temperaturas\n";
        echo "3. Mostrar matriz completa\n";
        echo "4. Mostrar temperatura de un año y mes\n";
        echo "5. Mostrar temperaturas de todos los meses de un año\n";
        echo "6. Mostrar temperaturas de un mes en todos los años y su promedio\n";
        echo "7. Hallar temperaturas máximas y mínimas\n";
        echo "8. Mostrar matriz de primavera\n";
        echo "9. Mostrar matriz de invierno (últimos 5 años)\n";
        echo "0. Salir\n";
        echo "Elija una opción: ";
        $opcion = intval(trim(fgets(STDIN)));
         
        
        switch ($opcion) {
            case 1:
                $matrizTemPrin = matrizTemp();
                echo "Se realizo la carga automatica de termperaturas.\n";
                break;
            case 2:
                $matrizTemPrin = matrizManual();
                break;
            case 3:
                columnaMatriz($matrizTemPrin);
                break;
            case 4:
                echo "Ingrese el año (Desde 2014 hasta el 2023): ";
                $anio = intval(trim(fgets(STDIN)));
                echo "Ingrese el mes (Del 1 al 12): ";
                $mes = intval(trim(fgets(STDIN)));
                devuelveTemp($matrizTemPrin, $colum);
                break;
            case 5:
                echo "Ingrese el año (Desde el 2014 hasta el 2023): ";
                $anio = intval(trim(fgets(STDIN)));
                tempMensual($anio, $matrizTemPrin);
                break;
            case 6:
                echo "Ingrese el mes (Del 1 al 12): ";
                $fila = intval(trim(fgets(STDIN)));
                tempAnual ($mes, $matrizTemPrin);
                break;
            case 7:
                tempMaxMin($matrizTemPrin);
                break;  
            case 8:
                $primavera = tempPrimavera($matrizTemPrin);
                muestraTemp($primavera); //a revisar
                break;    
            case 9:
                $invierno = tempInvierno($matrizTemPrin);
                muestraTemp($invierno); //a revisar
                break;
            case 0:
                echo "Saliendo del programa.\n";
                break;
            default:
                 echo "La opcion elegida es erronea. Ingrese nuevamente.\n";
        }
    }while ($opcion != 0);
}
// para poder ejecutar el menú
menuOpcion();

?>