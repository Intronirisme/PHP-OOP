<?php
class Game {
    private $_turns = 30;
    
    protected $currentTurn;
    
    public $hero;
    public $monsters = array();

    function __construct($nbCase, $nbTurns, $nbMonsters) {
        $this->set_turns($nbTurns);

        //set grid dimension
        $this->sizeX = 1;
        do {
            $this->sizeX++;
            $this->sizeY = floor($nbCase / $this->sizeX);
        } while ($this->sizeX < $this->sizeY);

        //spawn monsters
        for($i = 0; $i < $nbMonsters; $i++) {
            // $tempMonster = new 
            // array_push($monsters, )
        }
    }

    function reset() {

    }

    function set_turns($turns) {
        $this->_turns = $turns;
    }

    function get_turns() {
        return $this->_turns;
    }

    function get_currentTurn() {
        return $this->currentTurn;
    }

    function update($direction) {
        return;
    }
}
?>