<?php
abstract class Pokemon {
    protected $name;
    protected $type;
    protected $level;
    protected $hp;
    protected $specialMove;
    protected $imagePath; 
    protected $gifPath;

    public function __construct($name, $type, $level, $hp, $specialMove, $imagePath, $gifPath) {
        $this->name = $name;
        $this->type = $type;
        $this->level = $level;
        $this->hp = $hp;
        $this->specialMove = $specialMove;
        $this->imagePath = $imagePath; 
        $this->gifPath = $gifPath;
    }

    public function getName() { return $this->name; }
    public function getType() { return $this->type; }
    public function getLevel() { return $this->level; }
    public function getHp() { return $this->hp; }
    public function getSpecialMove() { return $this->specialMove; }
    
    public function getImage() { return $this->imagePath; }
    public function getGif() {return $this->gifPath; }

    abstract public function train($type, $intensity);
    abstract public function performSpecialMove();
}
?>