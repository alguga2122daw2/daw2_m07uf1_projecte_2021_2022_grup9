<?php
if ($hidemenu == false) {
    session_start();
}
include($_SERVER['DOCUMENT_ROOT']."/src/includes.php");
// TODO: Implementar un botón custom en la pagina web para tirar hacia atras (lo pide el collados)
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
        echo "<input type='button' value='<'>";
        //if ($filename != "index.php") {
        if ($hidemenu == false) {
           echo "<div id='session_info'><ul>",
           "<li>Usuari: ", $_SESSION["user"],"</li>",
           "<li>Categoria: ", $_SESSION["rol"],"</li>",
           "<li>Identificador: ", $_SESSION["identificador"],"</li>",
           "<li>Sessió: ", session_id(),"</li>",
           "<form action='http://$_SERVER[HTTP_HOST]/proyectoPHP/index.php' method='post'><br><input type='hidden' name='logout'><input type='submit' value='logout'></form>",
           "</ul></div>";
        }
    ?>