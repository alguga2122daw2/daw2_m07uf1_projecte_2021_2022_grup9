<?php
include($_SERVER['DOCUMENT_ROOT']."/src/includes.php");
function read_file(string $filename):void{
    $tmpfile=fopen($_SERVER['DOCUMENT_ROOT']."/csv/".$filename, "r");
    while (($data = fgetcsv($tmpfile, 1000, ",")) !== FALSE) {
        switch($filename) {
            case "LlibresInfo":
                new Llibre($data[0],$data[1],$data[2],boolval($data[3]),$data[4],$data[5]);
                break;
            case "UsuarisInfo":
                new Usuari($data[0],$data[1],$data[2],$data[3],intval($data[4]),$data[5],$data[6],boolval($data[7]),$data[8],$data[9]);
                break;
            case "BibliotecarisInfo":
                new Bibliotecari($data[0],$data[1],$data[2],$data[3],intval($data[4]),$data[5],$data[6],$data[7],$data[8],floatval($data[9]),boolval($data[10]));
                break;
        }
    }
    fclose($tmpfile);
}

function append_line(string $filename, array $data):void{
    // $data es un array con todos los valores que se van a introducir en una nueva linea en el fichero especificado en $filename.
    $tmpfile=fopen($_SERVER['DOCUMENT_ROOT']."/csv/".$filename, "a");
    switch($filename) {
        case "LlibresInfo":
            fwrite($tmpfile,$data[0].",".$data[1].",".$data[2].",".$data[3].",".$data[4].",".$data[5]);
            break;
        case "UsuarisInfo":
            fwrite($tmpfile,$data[0].",".$data[1].",".$data[2].",".$data[3].",".intval($data[4]).",".$data[5].",".$data[6].",0,0,0");
            break;
        case "BibliotecarisInfo":
            fwrite($tmpfile,$data[0].",".$data[1].",".$data[2].",".$data[3].",".intval($data[4]).",".$data[5].",".$data[6].",".$data[7].",".$data[8].",".floatval($data[9]).",".intval($data[10]));
            break;
    }
    fwrite($tmpfile,"\n");
    fclose($tmpfile);
}

function remove_line(string $filename, int $index):void{
    $tmpfile = file($_SERVER['DOCUMENT_ROOT']."/csv/".$filename); // Carga el fichero entero en un array
    unset($tmpfile[$index]); // Borra la linea del array especificada en $index
    file_put_contents($_SERVER['DOCUMENT_ROOT']."/csv/".$filename, implode("", $tmpfile)); // Escribe el array de nuevo al archivo
}

function replace_line(string $filename, int $index, array $data):void{
    $tmpfile = file($_SERVER['DOCUMENT_ROOT']."/csv/".$filename); // Carga el fichero entero en un array
    switch ($filename){ // Reemplaza la linea del array especificada en $index
        case "LlibresInfo":
            $tmpfile[$index] = $data[0].",".$data[1].",".$data[2].",".$data[3].",".$data[4].",".$data[5]."\n";
            break;
        case "UsuarisInfo":
            $tmpfile[$index] = $data[0].",".$data[1].",".$data[2].",".$data[3].",".intval($data[4]).",".$data[5].",".$data[6].",".intval($data[7]).",".$data[8].",".$data[9]."\n";
            break;
        case "BibliotecarisInfo":
            $tmpfile[$index] = $data[0].",".$data[1].",".$data[2].",".$data[3].",".intval($data[4]).",".$data[5].",".$data[6].",".$data[7].",".$data[8].",".floatval($data[9]).",".intval($data[10])."\n";
            break;
    }
    file_put_contents($_SERVER['DOCUMENT_ROOT']."/csv/".$filename, implode("", $tmpfile)); // Escribe el array de nuevo al archivo
}