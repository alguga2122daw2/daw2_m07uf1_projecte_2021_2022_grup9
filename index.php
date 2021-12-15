<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
include("src/fileInteractions.php");
if (isset($_POST["logout"])){
    session_start();
    $_SESSION = array();
    if (ini_get("session.use_cookies")) {
        $params = session_get_cookie_params();
        setcookie(session_name(),'', time() - 42000,
            $params["path"], $params["domain"],
            $params["secure"], $params["httponly"]
        );
    }
    session_destroy();
}
$hidemenu = true;

// TODO: Permitir login de usuarios y bibliotecarios
read_file("BibliotecarisInfo");
read_file("UsuarisInfo");
foreach (Persona::getObjects() as $object){
    if($_POST["user"]==$object->getNom() && $_POST["password"]==$object->getContrasenya()){
        session_start();
        session_destroy();
        session_start();
        $_SESSION["user"]=$object->getNom();
        $_SESSION["identificador"]=$object->getIdentificador();
        $boss="";
        if ($object instanceof Bibiotecari) {
            if ($object->isCap()) $boss = "Cap";
        }
        $_SESSION["rol"]=get_class($object).$boss;
        header("Location: pagina1.php");
    }
}
?>
<?php $title = 'Index'; include($_SERVER['DOCUMENT_ROOT']."/templates/top.php");?>


<div id="login">
    <form method="post">
        <label for="user">User:</label>
        <input type="text" id="user" name="user">
        <label for="password">Password:</label>
        <input type="password" id="password" name="password">
        <input type="submit">
    </form>
</div>
<?php include($_SERVER['DOCUMENT_ROOT']."/templates/bottom.php");?>