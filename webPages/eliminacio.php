<?php $title = 'Eliminació'; include($_SERVER['DOCUMENT_ROOT']."/templates/top.php");?>

<?php
$contingut = $_GET["contingut"]; // El nombre de la clase
$id = $_GET["id"]; // El indice del array
read_file($contingut."sInfo"); // Lee el archivo que corresponda con la clase
$object = $contingut::getObjects()[$id]; // Asigna el objeto de la clase $contingut e indice $id a la variable $object

if ($contingut == "Usuari" || $contingut == "Bibliotecari") echo "<p>$contingut " . $object->getNom() . " ($id) eliminat.</p>";
else echo "<p>$contingut " . $object->getTitol() . " ($id) eliminat.</p>";
remove_line($contingut."sInfo",$id);

?>

<?php include($_SERVER['DOCUMENT_ROOT']."/templates/bottom.php");?>