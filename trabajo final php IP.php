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
function matrizManual() {
    $anio = 0; $mes = 0;
    for ($anio = 0; $anio < 10; $anio++) {
        for ($mes = 0; $mes < 12; $mes++) {
            do {
                echo "Ingrese una temperatura mayor a -50 y menor a 50\n";
                $temperatura = trim(fgets(STDIN));

                if ($temperatura < -50 || $temperatura > 50) {
                    echo "La temperatura ingresada no es válida. Debe estar entre -50 y 50.\n";
                }
            } while ($temperatura < -50 || $temperatura > 50);  
                  $matrizTemPrin[$anio][$mes] = $temperatura;
        }
    }
    return $matrizTemPrin;
}


function columnaMatriz($matrizTemPrin){
    $anio = 0; $mes = 0;
    echo "----------------------------------------------------------------------------------------------\n";
    echo "    Año   |   Ene    Feb    Mar    Abr    May    Jun    Jul    Ago    Sep    Oct    Nov    Dic\n";
    echo "----------------------------------------------------------------------------------------------\n";

    for ($anio = 0; $anio < 10; $anio++){
        echo ("\n")."Año " . (2014 + $anio) . ":";
        for ($mes = 0; $mes < 12; $mes++){
       printf(" %6d", $matrizTemPrin[$anio][$mes]); // Ajusta la alineación de columnas
        }
        echo "\n";
    }
    echo "------------------------------------------------------------------------------------------------\n";
      } 
    
//punto d, devuelve temp dado mes y año
function devuelveTemp($matrizTemPrin, $anio, $mes){
    $fila = $mes - 1;
    $colum = $anio - 2014;

    $temp = $matrizTemPrin[$colum][$fila];
  return $temp;  
} 
    
//punto e, devuelve la temperatura de cada mes dependiendo del año elegido
function tempMensual($anio, $matrizTemPrin){
    $colum = $anio - 2014;
    $cantElementos = count($matrizTemPrin[$colum]) ;
    for($mes = 0; $mes < $cantElementos; $mes++){
        echo $matrizTemPrin[$colum][$mes].("\n"); 
    }
}

//punto f, muestra para un mes determinado las temp de todos los años y el promedio
function tempAnual($mes, $matrizTemPrin){
    $fila = $mes - 1; 
    $suma = 0;
    $contPromedio = 0;
    for ($anio = 0; $anio < count($matrizTemPrin); $anio++){
        echo (2014 + $anio). (":") .$matrizTemPrin[$anio][$fila] .("°C\n");
    $suma +=  $matrizTemPrin[$anio][$fila];
    $contPromedio++;
    }
    if ($contPromedio > 0) {
        $contPromedio = $suma / $contPromedio;
        echo "Promedio: " . round($contPromedio,2) . "°C\n";
 }      
   
}
//punto g, muestra temperaturas máximas y mínimas halladas en un periodo de tiempo
function tempMaxMin($matrizTemPrin) {
    $tempMax = $matrizTemPrin[0][0];
    $tempMin = $matrizTemPrin[0][0];
    $mesMax = 1;
    $mesMin = 1;
    $anioMax = 2014;
    $anioMin = 2014;

    for ($anio = 0; $anio < count($matrizTemPrin); $anio++) {
        for ($mes = 0; $mes < count($matrizTemPrin[$anio]); $mes++) {
            $tempActual = $matrizTemPrin[$anio][$mes];

            if ($tempActual > $tempMax) {
                $tempMax = $tempActual;
                $anioMax = 2014 + $anio;
                $mesMax = $mes + 1;
            }

            if ($tempActual < $tempMin) {
                $tempMin = $tempActual;
                $anioMin = 2014 + $anio;
                $mesMin = $mes + 1;
            }
        }
    }

    // Mostrar en formato de cuadro
    $meses = ["Ene", "Feb", "Mar", "Abr", "May", "Jun", "Jul", "Ago", "Sep", "Oct", "Nov", "Dic"];
    echo    "-------------------------------------------------\n";
    echo    "| Año | Mes Max | Temp Max | Mes Min | Temp Min |\n";
    echo    "-------------------------------------------------\n";

    for ($anio = 0; $anio < count($matrizTemPrin); $anio++) {
        $tempMaxAnio = $matrizTemPrin[$anio][0];
        $tempMinAnio = $matrizTemPrin[$anio][0];
        $mesMaxAnio = 0;
        $mesMinAnio = 0;

        for ($mes = 0; $mes < count($matrizTemPrin[$anio]); $mes++) {
            if ($matrizTemPrin[$anio][$mes] > $tempMaxAnio) {
                $tempMaxAnio = $matrizTemPrin[$anio][$mes];
                $mesMaxAnio = $mes;
             }
             if ($matrizTemPrin[$anio][$mes] < $tempMinAnio) {
                $tempMinAnio = $matrizTemPrin[$anio][$mes];
                $mesMinAnio = $mes;
              }
             }

               printf("| %2d |   %1s    |   %4d  |   %1s    |   %4d  |\n", 
               2014 + $anio, 
               $meses[$mesMaxAnio], 
               $tempMaxAnio, 
               $meses[$mesMinAnio], 
               $tempMinAnio);
               }

               echo "--------------------------------------------------\n";
 }



 // H muestra temperaturas de primavera de todos los años
 function tempPrimavera($matrizTemPrin){
    $primavera = [];
    for ($anio = 0; $anio < count($matrizTemPrin); $anio++){
        $primavera[$anio] = [$matrizTemPrin[$anio][9], $matrizTemPrin[$anio][10], $matrizTemPrin[$anio][11]]; 
    }
    return $primavera;
 }
 // I Muestra temperaturas de invierno en los ultimos cinco años 
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
        echo ("\n")."Menú de opciones:".("\n");
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
                $temperatura = devuelveTemp($matrizTemPrin, $anio, $mes);
                echo "Dado el año y el mes la temperatura es: ".$temperatura;
                break;
            case 5:
                echo "Ingrese el año (Desde el 2014 hasta el 2023): ";
                $anio = intval(trim(fgets(STDIN)));
                tempMensual($anio, $matrizTemPrin);
                break;
            case 6:
                echo "Ingrese el mes (Del 1 al 12): ";
                $mes = intval(trim(fgets(STDIN)));
                tempAnual($mes, $matrizTemPrin);
                break;
            case 7:
                tempMaxMin($matrizTemPrin);
                break;  
            case 8:
                $primavera = tempPrimavera($matrizTemPrin);
                   echo "-----------------------------------------\n";
                   echo "    Año   |      oct     nov     dic\n";
                   echo "-----------------------------------------\n";

                   for ($anio = 0; $anio < count($primavera); $anio++) {
                   echo "   " . (2014 + $anio) . "   |"; 
                   for ($mes = 0; $mes < count($primavera[$anio]); $mes++) {
                   printf(" %7d", $primavera[$anio][$mes]);
                    }
                   echo "\n";
                   }
                   echo "-----------------------------------------\n";
                   break;           
            case 9:
                $invierno = tempInvierno($matrizTemPrin);
                  echo "-----------------------------------------\n";
                  echo "    Año   |      jul     ago     sep\n";
                  echo "-----------------------------------------\n";
            
                  for ($anio = 0; $anio < count($invierno); $anio++) {
                    echo "   " . (2019 + $anio) . "   |"; 
                    for ($mes = 0; $mes < count($invierno[$anio]); $mes++) {
                        printf(" %7d", $invierno[$anio][$mes]);
                    }
                    echo "\n";
                }
                  echo "-----------------------------------------\n";
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