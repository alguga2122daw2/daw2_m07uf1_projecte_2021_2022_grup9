<?php
include("src/fileInteractions.php");
if (isset($_POST["logout"])){
    session_start();
    session_destroy();
}

// TODO: Permitir login de usuarios y bibliotecarios
$logintype = "Bibliotecari";
read_file($logintype."sInfo");
foreach ($logintype::getObjects() as $object){
    if($_POST["user"]==$object->getNom() && $_POST["password"]==$object->getContrasenya()){
        session_start();
        session_destroy();
        session_start();
        $_SESSION["user"]=$object->getNom();
        $boss="";
        if ($object->isCap()) $boss = "Cap";
        $_SESSION["rol"]=$logintype.$boss;
        header("Location: pagina1.php");
    }
}
?>
<?php $title = 'Index'; include($_SERVER['DOCUMENT_ROOT']."/templates/top.php");?>


<div id="login">
    <form action="./index.php" method="post">
        <label for="user">User:</label>
        <input type="text" id="user" name="user">
        <label for="password">Password:</label>
        <input type="password" id="password" name="password">
        <input type="submit">
    </form>
</div>
<?php include($_SERVER['DOCUMENT_ROOT']."/templates/bottom.php");?>