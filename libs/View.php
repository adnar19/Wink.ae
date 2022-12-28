<?php
class View
{
	
	function __construct()
	{
		
	}
	public function loadview( $name )
	{
			require 'views/dashboard/'.$name.'.php';
		
	}
	
}
?>
