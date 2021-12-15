<?php
class Llibre implements IpdfManager, IToString{
    private static array $llibres = array();
    private string $titol;
    private string $autor;
    private string $isbn;
    private bool $prestec;
    private string $iniciPrestec;
    private string $identificadorUsuariPrestec;

    public function __construct(string $titol, string $autor, string $isbn, bool $prestec, string $iniciPrestec, string $identificadorUsuariPrestec){
        $this->titol = $titol;
        $this->autor = $autor;
        $this->isbn = $isbn;
        $this->prestec = $prestec;
        $this->iniciPrestec = $iniciPrestec;
        $this->identificadorUsuariPrestec = $identificadorUsuariPrestec;
        array_push(self::$llibres, $this);
    }

    public static function getObjects(): array{
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
        $tmp="<ul>";
        foreach($this as $key => $value) {
            $tmp.="<li>$key: $value</li>";
        }
        $tmp.="</ul>";
        return $tmp;
        /*
        return "\$titol: " . $this->titol . ". \$autor: " . $this->autor .
            ". \$isbn: " . $this->isbn . ". \$prestec" . $this->prestec .
            ". \$iniciPrestec: " . $this->iniciPrestec . ". \$identificadorUsuariPrestec: " . $this->identificadorUsuariPrestec;
        */
    }

    public function availableGetters(): array{
        return array("getTitol", "getAutor", "getIsbn", "getPrestec", "getIniciPrestec", "getIdentificadorUsuariPrestec");
    }

    public function getVariableNames(): array{
        return array("titol","autor","ISBN","prestec","inici prestec","identificador usuari prestec");
    }
}