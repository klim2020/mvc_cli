MVC Project for a CLI 
entry point for a project is: main.php
in cmd type :  php main.php

Project Folder Structure is: 

App/ -
	-core/
		-controller.php - parent controller
		-model.php - parent model
		-router.php - router, invokes needed controllers with Controller::run() method in main.php
		-view.php - parent view
	-models/    -a folder that holds all models, all models inherits core/model.php
		-tableFormatModel.php - holds methods to format data
		-dataConnector.php  - holds methods to get data from datasource
	-controllers/ -a folder for all controllers 
		-GOTController.php - main controller for a Game Of Throne table
	-views/ a folder for a views
		-GOTViewer.php - view file for Game Of Throne table
db/ folder with data
	-db.php - file that holds array with data for a table
main.php - etry point for an application



How it works:


in main.php you provide a route with controller name e.g. Router::run($controllername,$params), $controllername must be the same as a file in controllers/ folder, the program will automaticly invoke needed controller and will supply needed params to it if you declare them in $params variable.

in you controler you override index() function which will be an entry point for a controller. You can add any model you need, after all data have been formed you will need to invoke render($tplname,$data) method, $tplname must be the same as in views/ folder. You also can supply data array for a view. Keys from this array  will be extracted so in view you will be using data keys as varables  e.g. $data['header']  becomes $header in view.


