<?php
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

if (isset($_POST["category"])) read_file($_POST["category"]."sInfo");
foreach (Persona::getObjects() as $object){
    if (isset($_POST["user"]) && isset($_POST["password"])){
        if($_POST["user"]==$object->getNom() && $_POST["password"]==$object->getContrasenya()){
            session_start();
            session_destroy();
            session_start();
            $_SESSION["user"]=$object->getNom();
            $_SESSION["identificador"]=$object->getIdentificador();
            $boss="";
            if ($object instanceof Bibliotecari) {
                if ($object->isCap()) $boss = "Cap";
            }
            $_SESSION["rol"]=get_class($object).$boss;
            header("Location: pagina1.php");
        }
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
        <select name="category" id="category">
            <option value="Bibliotecari">Bibliotecari</option>
            <option value="Usuari">Usuari</option>
        </select>
        <input type="submit" value='login'>
    </form>
</div>
<?php include($_SERVER['DOCUMENT_ROOT']."/templates/bottom.php");?>