<?php
class Bibliotecari extends Persona{
    private int $nSeguretatSocial;
    private string $iniciFeina;
    private float $salari;
    private bool $cap;

    public function __construct(int $nSeguretatSocial, string $iniciFeina, float $salari, bool $cap){
        $this->nSeguretatSocial = $nSeguretatSocial;
        $this->iniciFeina = $iniciFeina;
        $this->salari = $salari;
        $this->cap = $cap;
    }

    public function toString(){
        return "\$nom: " . $this->nom . ". \$cognom: " . $this->cognom .
        ". \$adrecaFisica: " . $this->adrecaFisica . ". \$adrecaCorreu" . $this->adrecaCorreu .
        ". \$telefon: " . $this->telefon . ". \$identificador: " . $this->identificador .
        ". \$contrasenya: " . $this->contrasenya . ". \$nSeguretatSocial: " . $this->nSeguretatSocial .
        ". \$iniciFeina: " . $this->iniciFeina . ". \$salari: " . $this->salari . 
        ". \$cap: " . $this->cap;
    }
}
?>