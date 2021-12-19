<?php include($_SERVER['DOCUMENT_ROOT']."/templates/top.php");?>

<div id="containerCRUD">
    <?php
        if ($_GET["contingut"] != "dadesPersonals" && !($_GET["contingut"] == "Llibre" && $_SESSION["rol"] == "Usuari")){
            echo "<a href='webPages/creacio.php?", $_SERVER['QUERY_STRING'],"'><input type='submit' value='CREACIÓ'/></a>";
        }
        $visualitzacio_value = "VISUALITZACIÓ"; // Todos los roles pueden visualizar
        if ($_SESSION["rol"] != "Usuari") $visualitzacio_value .= "/MODIFICACIÓ"; // Pero solo los usuarios no pueden modificar también.

    ?>
    <a href="webPages/visualitzacio.php?contingut=<?php echo $_GET["contingut"]?>"><input type="submit" value="<?php echo $visualitzacio_value?>"/></a>

</div>


<?php include("templates/bottom.php")?>
