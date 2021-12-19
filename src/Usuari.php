<?php
class Usuari extends Persona{
    private bool $prestec;
    private string $iniciPrestec; // Si no té deixat en préstec cap llibre la data serà 0.
    private string $isbnPrestec; // Si no té deixat en préstec, l'ISBN serà 0.

    public function __construct(string $nom, string $cognom, string $adrecaFisica, string $adrecaCorreu, int $telefon, string $identificador, string $contrasenya, bool $prestec, string $iniciPrestec, string $isbnPrestec){
        parent::__construct($nom, $cognom, $adrecaFisica, $adrecaCorreu, $telefon, $identificador, $contrasenya);
        $this->prestec = $prestec;
        $this->iniciPrestec = $iniciPrestec;
        $this->isbnPrestec = $isbnPrestec;
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
        $tmp="<ul>";
        foreach($this as $key => $value) {
            $tmp.="<li>$key: $value</li>";
        }
        $tmp.="</ul>";
        return $tmp;
    }

    public function availableGetters(): array{
        return array("getNom","getCognom","getAdrecaFisica","getAdrecaCorreu","getTelefon","getIdentificador","getContrasenya","isPrestec","getIniciPrestec","getIsbnPrestec");
    }

    public function getVariableNames(): array{
        return array("nom","cognom","adreça fisica","adreça correu","telèfon","identificador","contrasenya","prestec","inici prestec","isbn prestec");
    }
}
?>