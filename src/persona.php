<?php
abstract class Persona {
    protected string $nom;
    protected string $cognom;
    protected string $adrecaFisica;
    protected string $adrecaCorreu;
    protected int $telefon;
    protected string $identificador;
    protected string $contrasenya;

    function __construct($nom, $cognom, $adrecaFisica, $adrecaCorreu, $telefon, $identificador, $contrasenya){
        $this->nom = $nom;
        $this->cognom = $cognom;
        $this->adrecaFisica = $adrecaFisica;
        $this->adrecaCorreu = $adrecaCorreu;
        $this->telefon = $telefon;
        $this->identificador = $identificador;
        $this->contrasenya = $contrasenya;
    }

    public function toString(){
        return "\$nom: " . $this->nom . ". \$cognom: " . $this->cognom .
        ". \$adrecaFisica: " . $this->adrecaFisica . ". \$adrecaCorreu" . $this->adrecaCorreu .
        ". \$telefon: " . $this->telefon . ". \$identificador: " . $this->identificador .
        ". \$contrasenya: " . $this->contrasenya;
    }
}
?>