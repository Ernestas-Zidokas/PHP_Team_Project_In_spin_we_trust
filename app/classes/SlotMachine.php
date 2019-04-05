<?php

namespace App;

class SlotMachine extends App\Abstracts\SlotMachine {

    public function __construct($bandymo_kaina, $eiluciu_skaicius, $stulpeliu_skaicius, $variantu_celeje_skaicius, $fairness_coficientas) {
        $this->bandymo_kaina = $bandymo_kaina;
        $this->eiluciu_skaicius = $eiluciu_skaicius;
        $this->stulpeliu_skaicius = $stulpeliu_skaicius;
        $this->variantu_celeje_skaicius = $variantu_celeje_skaicius;
        $this->fairness_coficientas = $fairness_coficientas;
    }

    public function Shuffle() {
        $this->state = [];

        for ($i = 0; $i < $this->stulpeliu_skaicius; $i++) {
            for ($j = 0; $j < 3; $i++) {
                $this->state[$i][$j] = rand(1, $this->variantu_celeje_skaicius);
            }
        }
        return $this->state;
    }

    public function getMiddleRow() {
        $idx = ceil($this->stulpeliu_skaicius / 2) - 1;
        return $this->state[$idx];
    }

    public function Outcome() {
        $suma = 0;
        foreach ($this->getMiddleRow() as $value) {
            $suma += $value;
        }
        if ($suma % $this->stulpeliu_skaicius == 0) {
            return $this->bandymo_kaina * $this->fairness_coficientas * ($this->variantu_celeje_skaicius ** $this->stulpeliu_skaicius);
        }

        return false;
    }

    public function getBandymoKaina() {
        return $this->bandymo_kaina;
    }

}
