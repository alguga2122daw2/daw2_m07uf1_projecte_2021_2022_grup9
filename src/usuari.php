<?php
class Usuari extends Persona{
    private bool $prestec;
    private string $iniciPrestec;
    private string $isbnPrestec;

    public function toString(){
        return "\$nom: " . $this->nom . ". \$cognom: " . $this->cognom .
        ". \$adrecaFisica: " . $this->adrecaFisica . ". \$adrecaCorreu" . $this->adrecaCorreu .
        ". \$telefon: " . $this->telefon . ". \$identificador: " . $this->identificador .
        ". \$contrasenya: " . $this->contrasenya . ". \$prestec: " . $this->prestec .
        ". \$iniciPrestec: " . $this->iniciPrestec . ". \$isbnPrestec: " . $this->isbnPrestec;
    }
}
?>