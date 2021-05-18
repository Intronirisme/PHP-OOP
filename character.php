<?php

use Character as GlobalCharacter;

require('board.php');
    require('svgInterface.php');
    abstract class Character implements SVGable {
        
        protected $_pos;
        protected $_speed;
        protected $_board;
    
        function __construct(Board $board, $speed)
        {
            $this->_board = $board;
            $this->_speed = $speed;
        }
    
        public function move($deltaX, $deltaY)
        {
            $x = $this->_pos['x'] + $deltaX;
            $y = $this->_pos['y'] + $deltaY;
            $this->_pos = $this->_board->checkPos($x, $y);
        }
    
        abstract function draw();
    }

    class Hero extends GlobalCharacter {

        function __construct(Board $board)
        {
            parent::__construct($board, 1);
            $this->_pos = $this->_board->getMiddle();
        }

        public function draw()
        {
            return '<circle cx="' . $this->_pos['x'] * 40 + 20 . '" cy="' . $this->_pos['y'] * 40 + 20 . '" r="20" fill="red"/>';
        }
    }
?>