<?php $title = 'Visualització'; include($_SERVER['DOCUMENT_ROOT']."/templates/top.php");?>

<?php
$contingut = $_GET["contingut"];
read_file($contingut."sInfo");

function generarTaula($class){
    $taula = $class::getObjects();
    $varnames = $taula[0]->getVariableNames();
    $getters = $taula[0]->availableGetters();

    // Titol de la taula
    $render = "<table border='1'><tr>\n";
    $render .= "<th>ID</th>";
    foreach ($varnames as $varname){
        $render .= "<th>$varname</th>";
    }
    $render .= ($_SESSION["rol"] != "Usuari") ? "<th colspan='2'>gestió</th>" : ""; // Operador ternario, si el rol no es Usuari se muestra el <th>, sino no se muestra nada.
    $render .= "</tr>\n";

    // Contingut de la taula
    foreach ($taula as $key => $value){
        $render .= "<tr><td>$key</td>";
        foreach ($getters as $getter){
            $render .= "<td>" . var_export($value->$getter(),true) . "</td>";
        }
        if ($_SESSION["rol"] != "Usuari") {
            $render .= "<td><form action='modificacio.php' method='POST'><input type='hidden' name='contingut' value='$class'><input type='hidden' name='id' value='$key'><input type='hidden' name='_method' value='PUT'><input type='submit' value='modificar'></form></td>";
            $render .= "<td><form action='eliminacio.php' method='get'><input type='hidden' name='contingut' value='$class'><input type='hidden' name='id' value='$key'><input type='hidden' name='_method' value='DELETE'><input type='submit' value='eliminar'></form></td>";
            $render .= "</tr>\n";
        }
    }
    $render .= "</table>";
    $_SESSION["render_table"] = $render;
    echo $_SESSION["render_table"];
}

generarTaula($contingut);
echo "<br><form action='imprimir.php' method='get'><input type='hidden' name='Imprimir' value='true'><input type='submit' value='Imprimir PDF'></form>";

?>

<?php include($_SERVER['DOCUMENT_ROOT']."/templates/bottom.php");?>
