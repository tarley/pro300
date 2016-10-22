<?php

require_once "util/Util.php";

/**
 * Created by PhpStorm.
 * User: NP
 * Date: 20/10/2016
 * Time: 19:58
 */
class Init
{
    public $bd;

    function  __construct()
    {
        $this->bd = new BDConnection();
    }
}