<?php

namespace ad\base;


use ad\Db;

abstract class Model
{
    public function __construct()
    {
        Db::instance();
    }
}