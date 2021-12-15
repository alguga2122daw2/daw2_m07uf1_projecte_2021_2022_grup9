<?php include_once($_SERVER['DOCUMENT_ROOT']."/templates/top.php");?>
<div class="personalInfo">
    <?php
        $userType= $_SESSION["rol"]=="BibliotecariCap"? "Bibliotecari":$_SESSION["rol"];
        read_file($userType."sInfo");
        foreach($userType::getObjects() as $field) {
            if ($field->getIdentificador()==$_SESSION["identificador"]) {
                echo "<ul>";
                echo $field->toString();
                /*
                for ($i = 0; $i < count($field->availableGetters()); $i++) {
                    $tmp=$field->availableGetters()[$i];
                    echo "<li>",$field->getVariableNames()[$i],"-->",$field->$tmp(),"</li>";
                }*/
                echo "</ul>";
                break;
            }
        }
    ?>
</div>
<?php include($_SERVER['DOCUMENT_ROOT']."templates/bottom.php")?>
