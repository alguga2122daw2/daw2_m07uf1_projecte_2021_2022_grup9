<?php
class Bibliotecari extends Persona{
    private string $nSeguretatSocial;
    private string $iniciFeina;
    private float $salari;
    private bool $cap;

    public function __construct(string $nom, string $cognom, string $adrecaFisica, string $adrecaCorreu, int $telefon, string $identificador, string $contrasenya, string $nSeguretatSocial, string $iniciFeina, float $salari, bool $cap){
        parent::__construct($nom, $cognom, $adrecaFisica, $adrecaCorreu, $telefon, $identificador, $contrasenya);
        $this->nSeguretatSocial = $nSeguretatSocial;
        $this->iniciFeina = $iniciFeina;
        $this->salari = $salari;
        $this->cap = $cap;
    }

    public function getNSeguretatSocial(): string{
        return $this->nSeguretatSocial;
    }

    public function setNSeguretatSocial(string $nSeguretatSocial): void{
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
        $tmp="<ul>";
        foreach($this as $key => $value) {
            if ($key == "cap"){
                $tmp.="<li>$key: ". var_export($value, true). "</li>";
            } else {
                $tmp.="<li>$key: $value</li>";
            }
        }
        $tmp.="</ul>";
        return $tmp;
    }

    public function availableGetters(): array{
        return array("getNom","getCognom","getAdrecaFisica","getAdrecaCorreu","getTelefon","getIdentificador","getContrasenya","getNSeguretatSocial","getIniciFeina","getSalari","isCap");
    }

    public function getVariableNames(): array{
        return array("nom","cognom","adre??a fisica","adre??a correu","tel??fon","identificador","contrasenya","numero seguritat social","inici feina","salari","cap");
    }
}
?>
