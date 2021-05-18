<?php
require('svgInterface.php');
class Board implements SVGable {
    
    protected $_sizeX;
    protected $_sizeY;
    public $color1;
    public $color2;

    function __construct($sizeX, $sizeY, $firstColor, $secondColor)
    {
        $this->color1 = $firstColor;
        $this->color2 = $secondColor;
    }

    public function checkPos($pos)
    {
        return array('x' => $pos['x'] % $this->_sizeX, 'y' => $pos['y'] % $this->_sizeY);
    }

    public function getMiddle()
    {
        return array('x' => floor($this->_sizeX / 2), 'y' => floor($this->_sizeY / 2));
    }

    public function draw()
    {
        $plateau = '';
        $bool = true;
        $plateau .= '<svg width="' . $this->sizeX * 40 . '" height="' . $this->sizeY * 40 . '" viewBox="0 0 ' . $this->sizeX * 40 . ' ' . $this->sizeY * 40 . '" >';
        for ($i = 0; $i < $this->sizeY; $i++) {
        $bool = !$bool;
        $color = $bool ? $this->color1 : $this->color2;
        for ($j = 0; $j < $this->sizeX; $j++) {
            $bool = !$bool;
            $color = $bool ? 'white' : 'black';
            $plateau .= '<rect width="40px" height="40px" x="' . $j * 40 . '" y="' . $i * 40 . '" fill="' . $color . '"></rect>';
        }
        }
        $plateau .= '<circle cx="60" cy="20" r="15" fill="red"/>';
        $plateau .= '</svg>';
        return $plateau;
    }
}