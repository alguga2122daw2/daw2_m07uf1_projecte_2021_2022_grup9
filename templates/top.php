<?php
if ($hidemenu == false) {
    session_start();
    if (!isset($_SESSION["pageArray"])) $_SESSION["pageArray"]=array();
    if ($_SESSION["pageArray"][sizeof($_SESSION["pageArray"])-1] != "http://{$_SERVER["HTTP_HOST"]}{$_SERVER["REQUEST_URI"]}"){
        array_push($_SESSION["pageArray"], "http://{$_SERVER["HTTP_HOST"]}{$_SERVER["REQUEST_URI"]}");
    }
}
if (isset($_POST["lastPage"])) {
    if (sizeof($_SESSION["pageArray"])>1){
        array_pop($_SESSION["pageArray"]);
    }
    header("location: {$_SESSION["pageArray"][sizeof($_SESSION["pageArray"])-1]}");
}

function redirectTohttps(){
    if(!isset($_SERVER["HTTPS"]) || $_SERVER["HTTPS"] != "on")
    {
        //Tell the browser to redirect to the HTTPS URL.
        header("Location: https://" . $_SERVER["HTTP_HOST"] . $_SERVER["REQUEST_URI"], true, 301);
        //Prevent the rest of the script from executing.
        exit;
    }
}

function exit_message() {
    echo "No tens permis per veure aquesta pagina web.";
    exit;
}

function page_permissions(){
    switch ($_SESSION["rol"]){
        case "Usuari":
            if ($_SERVER["SCRIPT_NAME"] == "/webPages/modificacio.php" ||
                $_SERVER["SCRIPT_NAME"] == "/webPages/eliminacio.php" ||
                $_SERVER["SCRIPT_NAME"] == "/webPages/creacio.php"){ // Denegar acceso a modificacio.php, eliminacio.php y creacio.php
                exit_message();
            }elseif ($_GET["contingut"] == "Bibliotecari" ||
                $_GET["contingut"] == "Usuari"){ // El usuario todavia puede acceder a visualitzacio.php, por ende hay que evitar que dentro de esa pagina pueda ver datos de Bibliotecari y Usuari
                exit_message();
            }
            break;
        case "Bibliotecari":
            if ($_GET["contingut"] == "Bibliotecari"){ // Un Bibliotecari no puede ver datos de sus compañeros.
                exit_message();
            }
            break;
        // Se omite poner un case para BibliotecariCap porque ese rol tiene todos los permisos
    }
    echo $_SERVER["SCRIPT_NAME"];
}

redirectTohttps();
page_permissions();

include($_SERVER['DOCUMENT_ROOT']."/src/includes.php");
?>
<html>
    <head>
        <title><?php echo $title; ?></title>
        <meta content="text/html; charset=UTF-8" http-equiv="content-type">
        <style>
            #container{
                width: 0px;
                position: absolute;
                top: 50%;
                left: 50%;
                border: 5px solid black;
                transform: translate(-50%, -50%);
            }
            #containerCRUD{
                position: absolute;
                top: 50%;
                left: 50%;
                border: 5px solid gray;
                transform: translate(-50%, -50%);
            }
            #container input, #containerCRUD input {
                width: 220px;
                height: 100px;
            }
            #login {
                width: 0px;
                position: absolute;
                top: 50%;
                left: 50%;
                transform: translate(-50%, -50%);
            }
            #session_info{
                position: fixed;
                top: 5%;
                right: 5%;
                background-color: gray;
                border: 5px solid black;
                border-radius: 5%;
                width: 300px;
                height: 300px;
                color: #ffffff;
            }
            .creationContainer{
                position: absolute;
                top: 50%;
                left: 50%;
                border: 5px solid black;
                transform: translate(-50%, -50%);
            }
            .creationContainer *{
                margin: 10px;
            }
        </style>
    </head>
    <body>
    <?php
        //if ($filename != "index.php") {
        if ($hidemenu == false) {
            echo "<form method='post'><input type='hidden' name='lastPage' value='{$_SERVER['HTTP_REFERER']}'><input type='submit' value='<'></form>";
           echo "<div id='session_info'><ul>",
           "<li>Usuari: ", $_SESSION["user"],"</li>",
           "<li>Categoria: ", $_SESSION["rol"],"</li>",
           "<li>Identificador: ", $_SESSION["identificador"],"</li>",
           "<li>Sessió: ", session_id(),"</li>",
           "<form action='https://".$_SERVER["HTTP_HOST"]."/index.php' method='post'><br><input type='hidden' name='logout'><input type='submit' value='logout'></form>",
           "</ul></div>";
        }
    ?>