<?php
class WINK
{
	protected $controller = 'home';
	protected $method = 'index';
	protected $params = [];
	function __construct()
	{
		
		error_reporting(1);
		$url = $this->parseURl();
		if (file_exists('controllers/'.$url[0].'.php')) {
			$this->controller = $url[0];
			unset($url[0]);
		}		
		require_once 'controllers/'.$this->controller.'.php';
		
		$this->controller = new $this->controller;
		if (isset($url[1])) {
			if (method_exists($this->controller, $url[1])) {
				$this->method = $url[1];
				unset($url[1]);
			}
			else $this->method = "error";
		}
		$this->params = $url ? array_values($url) : [];
		call_user_func_array([$this->controller,$this->method], $this->params);
	}
	public function parseURl()
	{
		if (isset($_GET['url'])) {
			return  explode('/',filter_var(rtrim($_GET['url'],'/'),FILTER_SANITIZE_URL));
		}
	}
}
?>
