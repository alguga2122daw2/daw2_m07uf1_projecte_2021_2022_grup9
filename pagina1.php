<?php include("templates/top.php");?>

    <div id="container">
        <a href="pagina2.php?llibres"><input type="submit" value="LLIBRES"/></a>
        <?php
            if ($_SESSION["rol"] != "Usuari") {
                echo "<a href='pagina2.php?usuaris''><input type='submit' value='USUARIS'/></a>";
            }
            if ($_SESSION["rol"]=="BibliotecariCap") {
                echo "<a href='pagina2.php?bibliotecaris'><input type='submit' value='BIBLIOTECARIS'/></a>";
            }
        ?>
        <a href="pagina2.php?dadesPersonals"><input type="submit" value="DADES PERSONALS"/></a>
    </div>


<?php include("templates/bottom.php")?>