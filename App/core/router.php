<?php 
class Router{    
    /**
     * run
     *
     * @param  mixed $routename - Controller name  that will be invoked
     * @param  mixed $params - additional parametres for work 
     * @return void
     */
    static function run($routename,$params){
        include "App/controllers/".$routename.".php";
        $controller = new $routename;
        $controller->index($params);
    }
}