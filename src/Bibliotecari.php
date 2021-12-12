<?php
class Bibliotecari extends Persona{
    private int $nSeguretatSocial;
    private string $iniciFeina;
    private float $salari;
    private bool $cap;

    public function __construct(string $nom, string $cognom, string $adrecaFisica, string $adrecaCorreu, int $telefon, string $identificador, string $contrasenya, int $nSeguretatSocial, string $iniciFeina, float $salari){
        parent::__construct($nom, $cognom, $adrecaFisica, $adrecaCorreu, $telefon, $identificador, $contrasenya);
        $this->nSeguretatSocial = $nSeguretatSocial;
        $this->iniciFeina = $iniciFeina;
        $this->salari = $salari;
        $this->cap = false;
        $tempFile=fopen("../csv/BibliotecarisInfo","a");
        fwrite($tempFile,$nom.",".$cognom.",".$adrecaFisica.",".$adrecaCorreu.",".$telefon.",".$identificador.",".$contrasenya.",".$nSeguretatSocial.",".$iniciFeina.",".$salari."\n");
        fclose($tempFile);
    }

    public function getNSeguretatSocial(): int{
        return $this->nSeguretatSocial;
    }

    public function setNSeguretatSocial(int $nSeguretatSocial): void{
        $this->nSeguretatSocial = $nSeguretatSocial;
    }

    public function getIniciFeina(): string{
        return $this->iniciFeina;
    }

    public function setIniciFeina(string $iniciFeina): void{
        $this->iniciFeina = $iniciFeina;
    }

    public function getSalari(): float{
        return $this->salari;
    }

    public function setSalari(float $salari): void{
        $this->salari = $salari;
    }

    public function isCap(): bool{
        return $this->cap;
    }

    public function setCap(bool $cap): void{
        $this->cap = $cap;
    }

    public function toString(): string{
        return "\$nom: " . $this->nom . ". \$cognom: " . $this->cognom .
        ". \$adrecaFisica: " . $this->adrecaFisica . ". \$adrecaCorreu" . $this->adrecaCorreu .
        ". \$telefon: " . $this->telefon . ". \$identificador: " . $this->identificador .
        ". \$contrasenya: " . $this->contrasenya . ". \$nSeguretatSocial: " . $this->nSeguretatSocial .
        ". \$iniciFeina: " . $this->iniciFeina . ". \$salari: " . $this->salari . 
        ". \$cap: " . $this->cap;
    }
}
?>