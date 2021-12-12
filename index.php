<?php
if (isset($_POST["logout"])){
    session_start();
    session_destroy();
}
$gestor=fopen("csv/UsrInfo", "r");
$hidemenu = true;
while (($datos = fgetcsv($gestor, 1000, ",")) !== FALSE) {
    if($_POST["user"]==$datos[0] && $_POST["password"]==$datos[1]) {
        fclose($gestor);
        session_start();
        session_destroy();
        session_start();
        $_SESSION["user"]=$datos[0];
        $_SESSION["rol"]=$datos[2];
        header("Location: pagina1.php");
    }
}
?>
<?php $title = 'Index'; include("templates/top.php");?>


<div id="login">
    <form action="./index.php" method="post">
        <label for="user">User:</label>
        <input type="text" id="user" name="user">
        <label for="password">Password:</label>
        <input type="password" id="password" name="password">
        <input type="submit">
    </form>
</div>
<?php include("templates/bottom.php");?>

