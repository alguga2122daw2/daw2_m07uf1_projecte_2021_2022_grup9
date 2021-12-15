<?php $title = 'Visualització'; include($_SERVER['DOCUMENT_ROOT']."/templates/top.php");?>

<?php
include_once "/home/albert/Documents/M07_Collados/proyectoPHP/.idea/vendor/autoload.php";
use Dompdf\Dompdf;


if ($_GET['Imprimir']=="true") {
    $dompdf = new Dompdf();
    $dompdf->loadHtml('<h1>Hola mundo</h1><br>');
    $dompdf->render();
    $dompdf->stream();
}
$contingut = $_GET["contingut"];
read_file($contingut."sInfo");

function generarTaula($class){
    $taula = $class::getObjects();
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
        echo "<td><form action='/webPages/modificacio.php' method='get'><input type='hidden' name='contingut' value='$class'><input type='hidden' name='id' value='$key'><input type='submit' value='modificar'></form></td>";
        echo "<td><form action='/webPages/eliminacio.php' method='get'><input type='hidden' name='contingut' value='$class'><input type='hidden' name='id' value='$key'><input type='submit' value='eliminar'></form></td>";
        echo "</tr>\n";
    }
    echo "</table>";
}

generarTaula($contingut);
echo "<br><form action='visualitzacio.php' method='get'><input type='hidden' name='Imprimir' value='true'><input type='submit' value='Imprimir PDF'></form>";

?>

<?php include($_SERVER['DOCUMENT_ROOT']."/templates/bottom.php");?>