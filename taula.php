<?php $title = 'Taula (DEV)'; include("templates/top.php");?>

<?php

// TODO: Implementar persistencia de datos
$bibliotecaris = array();
array_push($bibliotecaris, new Bibliotecari("Pepe1","Botella1","a1","a1@fje.edu",123,"A1","password","AAA111","01/01/2000",50));
array_push($bibliotecaris, new Bibliotecari("Pepe2","Botella2","a1","a1@fje.edu",123,"A1","password","AAA111","01/01/2000",50));
array_push($bibliotecaris, new Bibliotecari("Pepe3","Botella3","a1","a1@fje.edu",123,"A1","password","AAA111","01/01/2000",50));
array_push($bibliotecaris, new Bibliotecari("Pepe4","Botella4","a1","a1@fje.edu",123,"A1","password","AAA111","01/01/2000",50));


function generarTaula($taula){
    $varnames = $taula[0]->getVariableNames();
    $getters = $taula[0]->availableGetters();

    // Titol de la taula
    echo "<table border='1'><tr>\n";
    echo "<th>ID</th>";
    foreach ($varnames as $varname){
        echo "<th>$varname</th>";
    }
    echo "<th colspan='2'>gestió</th>";
    echo "</tr>\n";

    // Contingut de la taula
    foreach ($taula as $key => $value){
        echo "<tr><td>$key</td>";
        foreach ($getters as $getter){
            echo "<td>" . var_export($value->$getter(),true) . "</td>";
        }
        // TODO: Esto no se puede implementar completamente todavia porque no hay persistencia de datos
        echo "<td><form action='modificar.php' method='get'><input type='hidden' name='id' value='$key'><input type='submit' value='modificar'></form></td>";
        echo "<td><form action='eliminar.php' method='get'><input type='hidden' name='id' value='$key'><input type='submit' value='eliminar'></form></td>";
        echo "</tr>\n";
    }
    echo "</table>";
}

generarTaula($bibliotecaris);

?>

<?php include("templates/bottom.php");?>

