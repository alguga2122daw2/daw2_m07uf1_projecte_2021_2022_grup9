<?php
$gestor=fopen("./UsrInfo", "r");
$hidemenu = true;
while (($datos = fgetcsv($gestor, 1000, ",")) !== FALSE) {
    if($_POST["user"]==$datos[0] && $_POST["password"]==$datos[1]) {
        fclose($gestor);
        header("Location: http://localhost:63342/proyectoPHP/pagina1.php");
        session_name($_POST["user"]);
        session_start();
        echo "correcto";
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

