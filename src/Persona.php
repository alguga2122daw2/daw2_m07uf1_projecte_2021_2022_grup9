<?php
abstract class Persona implements IToString{
    protected static array $personas = array();
    protected string $nom;
    protected string $cognom;
    protected string $adrecaFisica;
    protected string $adrecaCorreu;
    protected int $telefon;
    protected string $identificador;
    protected string $contrasenya;

    public function __construct(string $nom, string $cognom, string $adrecaFisica, string $adrecaCorreu, int $telefon, string $identificador, string $contrasenya){
        $this->nom = $nom;
        $this->cognom = $cognom;
        $this->adrecaFisica = $adrecaFisica;
        $this->adrecaCorreu = $adrecaCorreu;
        $this->telefon = $telefon;
        $this->identificador = $identificador;
        $this->contrasenya = $contrasenya;
        array_push(self::$personas, $this);
    }

    public static function getPersonas(): array{
        return self::$personas;
    }

    public function getNom(): string{
        return $this->nom;
    }

    public function setNom(string $nom): void{
        $this->nom = $nom;
    }

    public function getCognom(): string{
        return $this->cognom;
    }

    public function setCognom(string $cognom): void{
        $this->cognom = $cognom;
    }

    public function getAdrecaFisica(): string{
        return $this->adrecaFisica;
    }

    public function setAdrecaFisica(string $adrecaFisica): void{
        $this->adrecaFisica = $adrecaFisica;
    }

    public function getAdrecaCorreu(): string{
        return $this->adrecaCorreu;
    }

    public function setAdrecaCorreu(string $adrecaCorreu): void{
        $this->adrecaCorreu = $adrecaCorreu;
    }

    public function getTelefon(): int{
        return $this->telefon;
    }

    public function setTelefon(int $telefon): void{
        $this->telefon = $telefon;
    }

    public function getIdentificador(): string{
        return $this->identificador;
    }

    public function setIdentificador(string $identificador): void{
        $this->identificador = $identificador;
    }

    public function getContrasenya(): string{
        return $this->contrasenya;
    }

    public function setContrasenya(string $contrasenya): void{
        $this->contrasenya = $contrasenya;
    }

    public function toString(): string{
        return "\$nom: " . $this->nom . ". \$cognom: " . $this->cognom .
        ". \$adrecaFisica: " . $this->adrecaFisica . ". \$adrecaCorreu" . $this->adrecaCorreu .
        ". \$telefon: " . $this->telefon . ". \$identificador: " . $this->identificador .
        ". \$contrasenya: " . $this->contrasenya;
    }
}
?>