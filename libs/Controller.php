<?php
class Controller
{
	
	function __construct()
	{
		$this->view = new View();
        $this->model = new Model();
	}
	public function load_model($model)
	{
		require_once 'models/'.$model.'.php';
		$this->model = new $model;
	}

}
?>
