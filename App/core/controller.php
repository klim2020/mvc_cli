<?php
include 'App/core/view.php';
abstract class Controller {
	
	public $model;
	public $view;
	
	function __construct()
	{
		$this->view = new View();
	}
		
	/**
	 * index
	 *	Main Entry Point for any Controller,
	 * all controllers must override this method
	 * @param  mixed $params - optional -  additional parametres, if needed
	 * @return void
	 */
	abstract function index($params='');
	
	/**
	 * renderView
	 * invokes a view with specified $tplname
	 * @param  mixed $tplname - file must be in App/view/$tplname.php
	 * @param  mixed $data - data that goes directly to a view
	 * @return void
	 */
	function renderView($tplname,$data = null){
		$this->view->generate($tplname,$data);
	}
	
}