<?php include_once($_SERVER['DOCUMENT_ROOT']."/templates/top.php");?>
<div class="personalInfo">
    <?php
        $userType= $_SESSION["rol"]=="BibliotecariCap"? "Bibliotecari":$_SESSION["rol"];
        read_file($userType."sInfo");
        foreach($userType::getObjects() as $field) {
            if ($field->getIdentificador()==$_SESSION["identificador"]) {
                // TODO: No se ve el valor de prestec (convertir boolean a string)
                echo "<ul>" . $field->toString() . "</ul>";
                break;
            }
        }
    ?>
</div>
<?php include($_SERVER['DOCUMENT_ROOT']."/templates/bottom.php")?>
