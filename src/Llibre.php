<?php
class Llibre implements IpdfManager, IToString
{
    public static $llibres=array();
    private $titol;
    private $autor;
    private $isbn;
    private $prestec;
    private $iniciPrestec;
    private $identificadorUsuariPrestec;
    /**
     * @param $llibres
     * @param $titol
     * @param $autor
     * @param $isbn
     * @param $prestec
     * @param $iniciPrestec
     */
    public function __construct($llibres, $titol, $autor, $isbn, $prestec, $iniciPrestec, $identificadorUsuariPrestec)
    {
        $this->llibres = $llibres;
        $this->titol = $titol;
        $this->autor = $autor;
        $this->isbn = $isbn;
        $this->prestec = $prestec;
        $this->iniciPrestec = $iniciPrestec;
        $this->identificadorUsuariPrestec = $identificadorUsuariPrestec;
        array_push(Llibre::$llibres,$this);
    }

    /**
     * @return mixed
     */
    public function getLlibres()
    {
        return $this->llibres;
    }

    /**
     * @param mixed $llibres
     */
    public function setLlibres($llibres): void
    {
        $this->llibres = $llibres;
    }

    /**
     * @return mixed
     */
    public function getTitol()
    {
        return $this->titol;
    }

    /**
     * @param mixed $titol
     */
    public function setTitol($titol): void
    {
        $this->titol = $titol;
    }

    /**
     * @return mixed
     */
    public function getAutor()
    {
        return $this->autor;
    }

    /**
     * @param mixed $autor
     */
    public function setAutor($autor): void
    {
        $this->autor = $autor;
    }

    /**
     * @return mixed
     */
    public function getIsbn()







    {
        return $this->isbn;
    }

    /**
     * @param mixed $isbn
     */
    public function setIsbn($isbn): void
    {
        $this->isbn = $isbn;
    }

    /**
     * @return mixed
     */
    public function getPrestec()
    {
        return $this->prestec;
    }

    /**
     * @param mixed $prestec
     */
    public function setPrestec($prestec): void
    {
        $this->prestec = $prestec;
    }

    /**
     * @return mixed
     */
    public function getIniciPrestec()
    {
        return $this->iniciPrestec;
    }

    /**
     * @param mixed $iniciPrestec
     */
    public function setIniciPrestec($iniciPrestec): void
    {
        $this->iniciPrestec = $iniciPrestec;
    }

    /**
     * @return mixed
     */
    public function getIdentificadorUsuariPrestec()
    {
        return $this->identificadorUsuariPrestec;
    }

    /**
     * @param mixed $identificadorUsuariPrestec
     */
    public function setIdentificadorUsuariPrestec($identificadorUsuariPrestec): void
    {
        $this->identificadorUsuariPrestec = $identificadorUsuariPrestec;
    }



    public static function crearPDF():void
    {
        // TODO: Implement crearPDF() method.
    }
    public function toString():string
    {
        return "\$titol: " . $this->titol . ". \$autor: " . $this->autor .
            ". \$isbn: " . $this->isbn . ". \$prestec" . $this->prestec .
            ". \$iniciPrestec: " . $this->iniciPrestec . ". \$identificadorUsuariPrestec: " . $this->identificadorUsuariPrestec;
    }

}