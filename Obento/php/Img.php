<?php
/**
 * Created by PhpStorm.
 * User: Myzu
 * Date: 05/06/2018
 * Time: 05:26
 */

class Img
{
    protected $_src;

    public function __construct($src)
    {
        $this->setSrc($src);
    }

    public function getSrc()
    {
        return $this->_src;
    }

    public function setSrc($src)
    {
        if (is_string($src)) {
            $this->_src = $src;
        }
    }

    public function getVue()
    {
        if (!empty($this->getSrc())) {
            $src = $this->getSrc();
            $src = explode("/", $src);
            $altpoint = end($src);
            $altpoint = explode(".",$altpoint);
            $alt = $altpoint[0];


            return '<img src="' . $this->getSrc() . '" alt="' . $alt . '"/>';
        }
    }
}

