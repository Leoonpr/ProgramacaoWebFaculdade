<?php

class MarchaException extends Exception {}

class Carro {
    private $modelo;
    private $rpm = 0;
    private $marcha = 0;
    private $velocidadeEmKm = 0;
    private $ligado = false;

    public function __construct($modelo) {
        $this->modelo = $modelo;
    }

    public function ligar() {
        if (!$this->ligado) {
            $this->ligado = true;
            if ($this->marcha == 0) {
                $this->rpm = 100;
            }
        }
    }

    public function desligar() {
        $this->ligado = false;
        $this->rpm = 0;
        $this->velocidadeEmKm = 0;
    }

    public function acelerar() {
        if ($this->ligado) {
            $this->rpm = min($this->rpm + 200, 6000);
            if ($this->marcha == 0) {
                $this->velocidadeEmKm += 10;
            } else {
                $this->velocidadeEmKm += 10 * abs($this->marcha);
            }
        }
    }

    public function desacelerar() {
        if ($this->ligado) {
            $this->rpm = max($this->rpm - 200, 0);
            if ($this->marcha == 0) {
                $this->velocidadeEmKm -= 10;
            } else {
                $this->velocidadeEmKm -= 10 * abs($this->marcha);
            }
            $this->velocidadeEmKm = max($this->velocidadeEmKm, 0);
        }
    }

    public function passarMarcha($novaMarcha) {
        if ($novaMarcha < -1 || $novaMarcha > 5) {
            throw new MarchaException("Marcha não suportada");
        }
        if ($novaMarcha == -1 && $this->marcha != 0) {
            throw new MarchaException("A caixa de marcha foi forçada. Engate ponto morto e repita a operação.");
        }
        if ($novaMarcha == -1 && $this->marcha == 1 && $this->rpm >= 2000) {
            throw new MarchaException("A caixa de marcha foi forçada. Engate ponto morto e repita a operação.");
        }
        $this->marcha = $novaMarcha;
    }

    public function subirMarcha() {
        if ($this->marcha < 5) {
            $this->marcha++;
        }
    }

    public function descerMarcha() {
        if ($this->marcha > -1) {
            $this->marcha--;
        }
    }

    public function getModelo() {
        return $this->modelo;
    }

    public function getRpm() {
        return $this->rpm;
    }

    public function getMarcha() {
        return $this->marcha;
    }

    public function getVelocidadeEmKm() {
        return $this->velocidadeEmKm;
    }

    public function isLigado() {
        return $this->ligado;
    }
}

// Exemplo de uso:
$carro = new Carro("Fusca");
$carro->ligar();
$carro->passarMarcha(3);
$carro->acelerar();
echo "Modelo: " . $carro->getModelo() . PHP_EOL;
echo "Marcha: " . $carro->getMarcha() .  PHP_EOL;
echo "RPM: " . $carro->getRpm() .  PHP_EOL;
echo "Velocidade: " . $carro->getVelocidadeEmKm() .  PHP_EOL;
