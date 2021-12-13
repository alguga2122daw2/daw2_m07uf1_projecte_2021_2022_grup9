<?php include_once("../templates/top.php");?>
<?php
include("../src/includes.php");
include("../src/fileInteractions.php");

// TODO: Compactar esto un poco (cambiar $_POST["formulari"] para que su valor coincida con el que se asigna a $filename)
if (isset($_POST["formulari"])){
    switch($_POST["formulari"]){
        case "llibres":
            $filename = "Llibre";
            $data = array($_POST["titol"],$_POST["autor"],$_POST["isbn"],0,0,0); // TODO: Permitir la creación de libros con $prestec, $iniciPrestec y $identificadorUsuariPrestec diferente a 0
            break;
        case "usuaris":
            $filename = "Usuari";
            $data = array($_POST["nom"],$_POST["cognom"],$_POST["adrecaFisica"],$_POST["adrecaCorreu"],intval($_POST["telefon"]),$_POST["identificador"],$_POST["contrasenya"]);
            break;
        case "bibliotecaris":
            $filename = "Bibliotecari";
            $data = array($_POST["nom"],$_POST["cognom"],$_POST["adrecaFisica"],$_POST["adrecaCorreu"],$_POST["telefon"],$_POST["identificador"],$_POST["contrasenya"],$_POST["nSeguretatSocial"],$_POST["iniciFeina"],$_POST["salari"],0); // TODO: Permitir la creación de BibliotecariCap
            break;
    }
    append_line($filename."sInfo",$data);
    echo "$filename \"$data[0]\" afegit amb èxit.";
}

switch ($_GET["contingut"]) {
    case "Llibre":
        echo "
                <div class='creationContainer'>
    <form action='creacio.php?llibres' method='post'>
        <input type='hidden' name='formulari' value='llibres'>
        <label for='titol'>Títol:</label>
        <input type='text' id='titol' name='titol'></br>
        <label for='autor'>Autor:</label>
        <input type='text' id='autor' name='autor'></br>
        <label for='isbn'>ISBN:</label>
        <input type='text' id='isbn' name='isbn'></br>
        <input type='submit' value='Enviar'>
    </form>
</div>
            ";
        break;
    case "Usuari":
        echo "
                <div class='creationContainer'>
    <form action='creacio.php?usuaris' method='post'>
        <input type='hidden' name='formulari' value='usuaris'>
        <label for='nom'>Nom:</label>
        <input type='text' id='nom' name='nom'></br>

        <label for='cognom'>Cognom:</label>
        <input type='text' id='cognom' name='cognom'></br>

        <label for='adrecaFisica'>Adreça física:</label>
        <input type='text' id='adrecaFisica' name='adrecaFisica'></br>

        <label for='adrecaCorreu'>Adreça Correu:</label>
        <input type='email' id='adrecaCorreu' name='adrecaCorreu'></br>

        <label for='telefon'>Telèfon:</label>
        <input type='tel' placeholder='123-45-678' id='telefon' name='telefon'></br>

        <label for='identificador'>Identificador:</label>
        <input type='text' id='identificador' name='identificador'></br>

        <label for='contrasenya'>Contrasenya:</label>
        <input type='text' id='contrasenya' name='contrasenya'></br>

        <input type='submit' value='Enviar'>
    </form>
</div>
            ";
        break;
    case "Bibliotecari":
        echo "
                <div class='creationContainer'>
    <form action='creacio.php?bibliotecaris' method='post'>
        <input type='hidden' name='formulari' value='bibliotecaris'>
        <label for='nom'>Nom:</label>
        <input type='text' id='nom' name='nom'></br>

        <label for='cognom'>Cognom:</label>
        <input type='text' id='cognom' name='cognom'></br>

        <label for='adrecaFisica'>Adreça física:</label>
        <input type='text' id='adrecaFisica' name='adrecaFisica'></br>

        <label for='adrecaCorreu'>Adreça Correu:</label>
        <input type='email' id='adrecaCorreu' name='adrecaCorreu'></br>

        <label for='telefon'>Telèfon:</label>
        <input type='tel' placeholder='123-45-678' id='telefon' name='telefon'></br>

        <label for='identificador'>Identificador:</label>
        <input type='text' id='identificador' name='identificador'></br>

        <label for='contrasenya'>Contrasenya:</label>
        <input type='text' id='contrasenya' name='contrasenya'></br>

        <label for='nSeguretatSocial'>Número seguretat social:</label>
        <input type='text' id='nSeguretatSocial' name='nSeguretatSocial'></br>

        <label for='iniciFeina'>Inici feina:</label>
        <input type='text' id='iniciFeina' name='iniciFeina'></br>

        <label for='salari'>Salari:</label>
        <input type='text' id='salari' name='salari'></br>

        <input type='submit' value='Enviar'>
    </form>
</div>

            ";
        break;
    default:
        echo "";
        break;
}
?>
<?php include($_SERVER['DOCUMENT_ROOT']."/templates/bottom.php");?>