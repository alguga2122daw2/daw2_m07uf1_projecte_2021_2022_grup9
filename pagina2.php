<?php include("templates/top.php");echo $_SERVER['QUERY_STRING'];?>

<div id="containerCRUD">
    <?php
        if ($_SERVER["QUERY_STRING"] != "dadesPersonals" && !($_SERVER["QUERY_STRING"] == "llibres" && $_SESSION["rol"] == "Usuari")){
            echo "<a href='webPages/creacio.php?", $_SERVER['QUERY_STRING'],"'><input type='submit' value='CREACIÓ'/></a>";
            echo "<a href='webPages/modificacio.php?",$_SERVER['QUERY_STRING'],"'><input type='submit' value='MODIFICACIÓ'/></a>";
        }
    ?>
    <a href="webPages/visualitzacio.php?<?php echo $_SERVER['QUERY_STRING']?>"><input type="submit" value="VISUALITZACIÓ"/></a>

</div>


<?php include("templates/bottom.php")?>
