<?php

namespace ad;

class App{

    public static $app;

    public function __construct(){
        $query = trim($_SERVER['QUERY_STRING'], '/');
        Router::dispatch($query);
    }


}