<?php
# When installed via composer
//require_once 'vendor/autoload.php';
//Small MVC Application. 
//Please read quiz.txt 
//and docs/readme.txt
//ini_set('display_errors', 1);
include "App/core/router.php";


//supply path to data
$params['source']='db/db.php';

//run router  which will invoke MVC Controller App/Controller/GOTController.php
Router::run("GOTController",$params);