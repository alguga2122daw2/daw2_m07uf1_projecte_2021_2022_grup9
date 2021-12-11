<?php
class Llibre implements IpdfManager, IToString{
    private static $llibres = array();
    private $titol;
    private $autor;
    private $isbn;
    private $prestec;
    private $iniciPrestec;
    private $identificadorUsuariPrestec;

    public function __construct($titol, $autor, $isbn){
        $this->titol = $titol;
        $this->autor = $autor;
        $this->isbn = $isbn;
        $this->prestec = false;
        $this->iniciPrestec = null;
        $this->identificadorUsuariPrestec = null;
        array_push(Llibre::$llibres,$this);
    }

    public static function getLlibres(): array{
        return self::$llibres;
    }

    public function setLlibres($llibres): void{
        $this->llibres = $llibres;
    }

    public function getTitol(){
        return $this->titol;
    }

    public function setTitol($titol): void{
        $this->titol = $titol;
    }

    public function getAutor(){
        return $this->autor;
    }

    public function setAutor($autor): void{
        $this->autor = $autor;
    }

    public function getIsbn(){
        return $this->isbn;
    }

    public function setIsbn($isbn): void{
        $this->isbn = $isbn;
    }

    public function getPrestec(){
        return $this->prestec;
    }

    public function setPrestec($prestec): void{
        $this->prestec = $prestec;
    }

    public function getIniciPrestec(){
        return $this->iniciPrestec;
    }

    public function setIniciPrestec($iniciPrestec): void{
        $this->iniciPrestec = $iniciPrestec;
    }

    public function getIdentificadorUsuariPrestec(){
        return $this->identificadorUsuariPrestec;
    }

    public function setIdentificadorUsuariPrestec($identificadorUsuariPrestec): void{
        $this->identificadorUsuariPrestec = $identificadorUsuariPrestec;
    }

    public static function crearPDF():void{
        // TODO: Implement crearPDF() method.
    }

    public function toString():string{
        return "\$titol: " . $this->titol . ". \$autor: " . $this->autor .
            ". \$isbn: " . $this->isbn . ". \$prestec" . $this->prestec .
            ". \$iniciPrestec: " . $this->iniciPrestec . ". \$identificadorUsuariPrestec: " . $this->identificadorUsuariPrestec;
    }

}