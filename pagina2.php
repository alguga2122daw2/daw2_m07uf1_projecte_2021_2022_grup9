<?php include($_SERVER['DOCUMENT_ROOT']."/templates/top.php");echo $_SERVER['QUERY_STRING'];?>

<div id="containerCRUD">
    <?php
        if ($_GET["contingut"] != "dadesPersonals" && !($_GET["contingut"] == "llibres" && $_SESSION["rol"] == "Usuari")){
            echo "<a href='webPages/creacio.php?", $_SERVER['QUERY_STRING'],"'><input type='submit' value='CREACIÓ'/></a>";
            // echo "<a href='webPages/modificacio.php?contingut=Llibre'><input type='submit' value='MODIFICACIÓ'/></a>"; // Esto ya esta dentro de visualizar
        }
    ?>
    <a href="webPages/visualitzacio.php?contingut=Llibre"><input type="submit" value="VISUALITZACIÓ"/></a>

</div>


<?php include("templates/bottom.php")?>
