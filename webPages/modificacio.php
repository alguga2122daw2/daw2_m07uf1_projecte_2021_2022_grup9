<?php include_once("../templates/top.php");?>
<?php
include("../src/includes.php");
include("../src/fileInteractions.php");

$contingut = $_GET["contingut"]; // El nombre de la clase
$id = $_GET["id"]; // El indice del array
read_file($contingut."sInfo"); // Lee el archivo que corresponda con la clase
$object = $contingut::getObjects()[$id]; // Asigna el objeto de la clase $contingut e indice $id a la variable $object
//echo $object->toString()."<br>"; // DEBUG

echo "Contingut: $contingut<br>";
echo "ID: $id<br>";

// TODO: Compactar esto con un foreach
// TODO: Implementar realmente la modificacion de datos al hacer submit al formulario con append_line() y remove_line()
switch ($contingut) {
    case "Llibre":
        echo "
                <div class='creationContainer'>
    <form action='creacio.php?llibres' method='post'>
        <input type='hidden' name='formulari' value='llibres'>
        <label for='titol'>Títol:</label>
        <input type='text' id='titol' name='titol' value='".$object->getTitol()."'></br>
        <label for='autor'>Autor:</label>
        <input type='text' id='autor' name='autor' value='".$object->getAutor()."'></br>
        <label for='isbn'>ISBN:</label>
        <input type='text' id='isbn' name='isbn' value='".$object->getIsbn()."'></br>
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
        <input type='text' id='nom' name='nom' value='".$object->getNom()."'></br>

        <label for='cognom'>Cognom:</label>
        <input type='text' id='cognom' name='cognom' value='".$object->getCognom()."'></br>

        <label for='adrecaFisica'>Adreça física:</label>
        <input type='text' id='adrecaFisica' name='adrecaFisica' value='".$object->getAdrecaFisica()."'></br>

        <label for='adrecaCorreu'>Adreça Correu:</label>
        <input type='email' id='adrecaCorreu' name='adrecaCorreu' value='".$object->getAdrecaCorreu()."'></br>

        <label for='telefon'>Telèfon:</label>
        <input type='tel' placeholder='123-45-678' id='telefon' name='telefon' value='".$object->getTelefon()."'></br>

        <label for='identificador'>Identificador:</label>
        <input type='text' id='identificador' name='identificador' value='".$object->getIdentificador()."'></br>

        <label for='contrasenya'>Contrasenya:</label>
        <input type='text' id='contrasenya' name='contrasenya' value='".$object->getContrasenya()."'></br>

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
        echo "Error";
}
?>
<?php include($_SERVER['DOCUMENT_ROOT']."/templates/bottom.php");?>