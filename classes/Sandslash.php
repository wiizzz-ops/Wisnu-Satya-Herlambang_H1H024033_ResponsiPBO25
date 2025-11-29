<?php
require_once 'Pokemon.php';

// INHERITANCE
class Sandslash extends Pokemon {

    public function __construct() {
        parent::__construct("Sandslash", "Ground", 5, 75, "Earthquake", "assets/Sandslash.png", "assets/sandslash-ground.gif");
    }

    // POLIMORFISME
    public function train($type, $intensity) {
        $xpGain = 0;
        $hpGain = 0;
        
        switch ($type) {
            case 'Defense': 
                $xpGain = $intensity * 1.5; 
                $hpGain = $intensity * 2;
                break;
            case 'Attack':
                $xpGain = $intensity * 1.2;
                $hpGain = $intensity * 1;
                break;
            case 'Speed': 
                $xpGain = $intensity * 0.8;
                $hpGain = $intensity * 0.5;
                break;
        }

        $this->level += floor($xpGain / 10); 
        $this->hp += $hpGain;

        return [
            'type' => $type,
            'intensity' => $intensity,
            'xp_gained' => $xpGain,
            'hp_gained' => $hpGain
        ];
    }

    public function performSpecialMove() {
        return "Sandslash menggunakan {$this->specialMove}! Tanah berguncang hebat!";
    }
}
?>