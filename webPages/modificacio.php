<?php include_once("../templates/top.php");?>
<?php
if ($_POST["_method"]=="PUT") {
    $contingut = $_POST["contingut"]; // El nombre de la clase
    $id = $_POST["id"]; // El indice del array
    read_file($contingut . "sInfo"); // Lee el archivo que corresponda con la clase
    $object = $contingut::getObjects()[$id]; // Asigna el objeto de la clase $contingut e indice $id a la variable $object

    if (isset($_POST["formulari"])) {
        $filename = $_POST["formulari"];
        switch ($filename) {
            case "Llibre":
                if ($_POST["identificadorUsuariPrestec"] == "0"){
                    $prestec = 0;
                    $data_hora = 0;
                }
                else {
                    $prestec = 1;
                    date_default_timezone_set("Europe/Madrid");
                    $data_hora = date("d/m/Y H:i:s");
                }

                $data = array($_POST["titol"], $_POST["autor"], $_POST["isbn"], $prestec, $data_hora, $_POST["identificadorUsuariPrestec"]);
                read_file("UsuarisInfo");
                foreach(Usuari::getObjects() as $userid => $usuari) { // Asigna un nuevo prestamo
                    if ($usuari->getIdentificador() == $_POST["identificadorUsuariPrestec"]) {
                        $userdata = array($usuari->getNom(), $usuari->getCognom(), $usuari->getAdrecaFisica(), $usuari->getAdrecaCorreu(), intval($usuari->getTelefon()), $usuari->getIdentificador(), $usuari->getContrasenya(), strval($prestec), strval($data_hora), strval($_POST["isbn"]));
                        replace_line("UsuarisInfo", $userid, $userdata);
                        break;
                    }
                }
                foreach(Usuari::getObjects() as $userid => $usuari){ // Limpia el prestamo anterior
                    if ($usuari->getIdentificador() != $_POST["identificadorUsuariPrestec"] && $usuari->getIsbnPrestec() == $_POST["isbn"]){
                        $userdata = array($usuari->getNom(), $usuari->getCognom(), $usuari->getAdrecaFisica(), $usuari->getAdrecaCorreu(), intval($usuari->getTelefon()), $usuari->getIdentificador(), $usuari->getContrasenya(), "0", "0", "0");
                        replace_line("UsuarisInfo", $userid, $userdata);
                        break;
                    }
                }
                break;
            case "Usuari":
                $data = array($_POST["nom"], $_POST["cognom"], $_POST["adrecaFisica"], $_POST["adrecaCorreu"], intval($_POST["telefon"]), $_POST["identificador"], $_POST["contrasenya"], $_POST["prestec"], $_POST["iniciPrestec"], $_POST["isbnPrestec"]);
                break;
            case "Bibliotecari":
                $data = array($_POST["nom"], $_POST["cognom"], $_POST["adrecaFisica"], $_POST["adrecaCorreu"], $_POST["telefon"], $_POST["identificador"], $_POST["contrasenya"], $_POST["nSeguretatSocial"], $_POST["iniciFeina"], $_POST["salari"], $_POST["cap"]);
                break;
        }
        replace_line($filename . "sInfo", $id, $data);
        echo "$filename \"$data[0]\" modificat amb èxit.<br>";
    }

// TODO: Compactar esto con un foreach
    if (!isset($_POST["formulari"])) {
        echo "Contingut: $contingut<br>";
        echo "ID: $id<br>";
        switch ($contingut) {
            case "Llibre":
                echo "
                <div class='creationContainer'>
                    <form action='modificacio.php' method='post'>
                        <input type='hidden' name='contingut' value='$contingut'>
                        <input type='hidden' name='id' value='$id'>
                        <input type='hidden' name='_method' value='PUT'>
                        <input type='hidden' name='formulari' value='" . $contingut . "'>
                        <label for='titol'>Títol:</label>
                        <input type='text' id='titol' name='titol' value='" . $object->getTitol() . "'></br>
                        <label for='autor'>Autor:</label>
                        <input type='text' id='autor' name='autor' value='" . $object->getAutor() . "'></br>
                        <label for='isbn'>ISBN:</label>
                        <input type='text' id='isbn' name='isbn' value='" . $object->getIsbn() . "'></br>
                        <label for='identificadorUsuariPrestec'>Prestar llibre a:</label>
                        <select id='identificadorUsuariPrestec' name='identificadorUsuariPrestec'>
                            <option value='0'>NINGÚ (eliminar prestec)</option>";
                read_file("UsuarisInfo");
                foreach (Usuari::getObjects() as $userid => $usuari){
                    if ($usuari->getIsbnPrestec() == $object->getIsbn() || $usuari->getIsbnPrestec() == 0){ // Si el usuario tiene este libro prestado o no tiene ningun libro prestado
                        if ($usuari->getIdentificador() == $object->getIdentificadorUsuariPrestec()){ // Si el identificador del usuario es el mismo que el del libro
                            echo "<option value='".$usuari->getIdentificador()."' selected> SELECCIÓ ACTUAL: ".$usuari->getNom()." (Identificador: ".$usuari->getIdentificador().")</option>";
                        } else { // Si no es igual quiere decir que aun no se le ha dejado el libro
                            echo "<option value='".$usuari->getIdentificador()."'>".$usuari->getNom()." (Identificador: ".$usuari->getIdentificador().")</option>";
                        }
                    }
                }
                echo "
                        </select><br>
                        <!-- <input type='text' id='identificadorUsuariPrestec' name='identificadorUsuariPrestec' value='" . $object->getIdentificadorUsuariPrestec() . "'> -->
                        <input type='submit' value='Enviar'>
                    </form>
                </div>
            ";
                break;
            case "Usuari":
                echo "
                <div class='creationContainer'>
    <form action='modificacio.php' method='post'>
    <input type='hidden' name='contingut' value='$contingut'>
        <input type='hidden' name='id' value='$id'>
        <input type='hidden' name='_method' value='PUT'>
        <input type='hidden' name='formulari' value='" . $contingut . "'>
        <label for='nom'>Nom:</label>
        <input type='text' id='nom' name='nom' value='" . $object->getNom() . "'></br>

        <label for='cognom'>Cognom:</label>
        <input type='text' id='cognom' name='cognom' value='" . $object->getCognom() . "'></br>

        <label for='adrecaFisica'>Adreça física:</label>
        <input type='text' id='adrecaFisica' name='adrecaFisica' value='" . $object->getAdrecaFisica() . "'></br>

        <label for='adrecaCorreu'>Adreça Correu:</label>
        <input type='email' id='adrecaCorreu' name='adrecaCorreu' value='" . $object->getAdrecaCorreu() . "'></br>

        <label for='telefon'>Telèfon:</label>
        <input type='tel' placeholder='123-45-678' id='telefon' name='telefon' value='" . $object->getTelefon() . "'></br>

        <label for='identificador'>Identificador:</label>
        <input type='text' id='identificador' name='identificador' value='" . $object->getIdentificador() . "'></br>

        <label for='contrasenya'>Contrasenya:</label>
        <input type='text' id='contrasenya' name='contrasenya' value='" . $object->getContrasenya() . "'></br>

        <input type='hidden' name='prestec' value='". $object->isPrestec(). "'>
        <input type='hidden' name='iniciPrestec' value='". $object->getIniciPrestec(). "'>
        <input type='hidden' name='isbnPrestec' value='". $object->getIsbnPrestec(). "'>

        <input type='submit' value='Enviar'>
    </form>
</div>
            ";
                break;
            case "Bibliotecari":
                echo "
                <div class='creationContainer'>
    <form action='modificacio.php' method='post'>
        <input type='hidden' name='contingut' value='$contingut'>
        <input type='hidden' name='id' value='$id'>
        <input type='hidden' name='_method' value='PUT'>
        <input type='hidden' name='formulari' value='" . $contingut . "'>
        <label for='nom'>Nom:</label>
        <input type='text' id='nom' name='nom' value='" . $object->getNom() . "'></br>

        <label for='cognom'>Cognom:</label>
        <input type='text' id='cognom' name='cognom' value='" . $object->getCognom() . "'></br>

        <label for='adrecaFisica'>Adreça física:</label>
        <input type='text' id='adrecaFisica' name='adrecaFisica' value='" . $object->getAdrecaFisica() . "'></br>

        <label for='adrecaCorreu'>Adreça Correu:</label>
        <input type='email' id='adrecaCorreu' name='adrecaCorreu' value='" . $object->getAdrecaCorreu() . "'></br>

        <label for='telefon'>Telèfon:</label>
        <input type='tel' placeholder='123-45-678' id='telefon' name='telefon' value='" . $object->getTelefon() . "'></br>

        <label for='identificador'>Identificador:</label>
        <input type='text' id='identificador' name='identificador' value='" . $object->getIdentificador() . "'></br>

        <label for='contrasenya'>Contrasenya:</label>
        <input type='text' id='contrasenya' name='contrasenya' value='" . $object->getContrasenya() . "'></br>

        <label for='nSeguretatSocial'>Número seguretat social:</label>
        <input type='text' id='nSeguretatSocial' name='nSeguretatSocial' value='" . $object->getNSeguretatSocial() . "'></br>

        <label for='iniciFeina'>Inici feina:</label>
        <input type='text' id='iniciFeina' name='iniciFeina' value='" . $object->getIniciFeina() . "'></br>

        <label for='salari'>Salari:</label>
        <input type='text' id='salari' name='salari' value='" . $object->getSalari() . "'></br>

        <input type='hidden' name='cap' value='". $object->isCap(). "'>

        <input type='submit' value='Enviar'>
    </form>
</div>

            ";
                break;
            default:
                echo "Error";
        }
    }
}
?>
<?php include($_SERVER['DOCUMENT_ROOT']."/templates/bottom.php");?>
