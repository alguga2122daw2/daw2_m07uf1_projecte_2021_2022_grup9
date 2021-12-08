<?php
include ("Persona.php");

class Usuari extends Persona{
    private bool $prestec;
    private string $iniciPrestec; // Si no té deixat en préstec cap llibre la data serà 0.
    private string $isbnPrestec; // Si no té deixat en préstec, l'ISBN serà 0.

    public function __construct(string $nom, string $cognom, string $adrecaFisica, string $adrecaCorreu, int $telefon, string $identificador, string $contrasenya){
        parent::__construct($nom, $cognom, $adrecaFisica, $adrecaCorreu, $telefon, $identificador, $contrasenya);
        $this->prestec = false;
        $this->iniciPrestec = 0;
        $this->isbnPrestec = 0;
    }

    public function isPrestec(): bool{
        return $this->prestec;
    }

    public function setPrestec(bool $prestec): void{
        $this->prestec = $prestec;
    }

    public function getIniciPrestec(): string{
        return $this->iniciPrestec;
    }

    public function setIniciPrestec(string $iniciPrestec): void{
        $this->iniciPrestec = $iniciPrestec;
    }

    public function getIsbnPrestec(): string{
        return $this->isbnPrestec;
    }

    public function setIsbnPrestec(string $isbnPrestec): void{
        $this->isbnPrestec = $isbnPrestec;
    }

    public function toString(): string{
        return "\$nom: " . $this->nom . ". \$cognom: " . $this->cognom .
        ". \$adrecaFisica: " . $this->adrecaFisica . ". \$adrecaCorreu" . $this->adrecaCorreu .
        ". \$telefon: " . $this->telefon . ". \$identificador: " . $this->identificador .
        ". \$contrasenya: " . $this->contrasenya . ". \$prestec: " . $this->prestec .
        ". \$iniciPrestec: " . $this->iniciPrestec . ". \$isbnPrestec: " . $this->isbnPrestec;
    }
}
?>