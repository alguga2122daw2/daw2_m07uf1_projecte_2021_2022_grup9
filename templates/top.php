<?php
include("includes.php");
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
                width: 200px;
                height: 100px;
            }
            #session_info{
                position: fixed;
                top: 5%;
                right: 5%;
                background-color: gray;
                border: 5px solid black;
                border-radius: 5%;
                width: 200px;
                height: 200px;
            }
        </style>
    </head>
    <body>
        <div id="session_info">
            <?php
            // if (sesion_iniciada) muestra_datos_sesion();
            // else muestra_formulario_login();
            ?>
        </div>