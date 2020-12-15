<?php
# When installed via composer
require_once 'vendor/autoload.php';
//Small MVC Application. 
//Please read quiz.txt 
//and docs/readme.txt
//ini_set('display_errors', 1);
include "App/core/router.php";


$faker = Faker\Factory::create();

// generate data by accessing properties
echo $faker->name;
  // 'Lucy Cechtelar';
echo $faker->address;
  // "426 Jordy Lodge
  // Cartwrightshire, SC 88120-6700"
echo $faker->text;
  // Dolores sit sint laboriosam dolorem culpa et autem. Beatae nam sunt fugit
  // et sit et mollitia sed.
  // Fuga deserunt tempora facere magni omnis. Omnis quia temporibus laudantium
  // sit minima sint.

//supply path to data
$params['source']='db/db.php';

//run router  which will invoke MVC Controller App/Controller/GOTController.php
Router::run("GOTController",$params);