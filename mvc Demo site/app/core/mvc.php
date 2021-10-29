<?php

class mvc
{
	private $view;
	
	public function bootstrap($path)
	{
		foreach(glob($path.'/*.php') as $file)  {
			include_once($file);
		}
		return true;
	}
	
	public function run()
	{
		if($this->bootstrap('../app/core') == false)  {
			die('error: failed bootstrap');
		}
		
		// default controller and action
		if(empty($_GET['controller']))  {
			$_GET['controller'] = 'articles';
		}
		if(empty($_GET['action']))      {
			$_GET['action'] = 'home';
		}

		if(! is_file('../app/controllers/'.$_GET['controller'].'.php'))    {
			die( '<h1>404</h1>');
		}
		
		include_once('../app/controllers/'.$_GET['controller'].'.php');
		$controller = 'controller'.ucFirst($_GET['controller']);
		$this->view       = new $controller();		// make an instance (object) of the controller-class 
		$method     = $_GET['action'];
		$this->view->$method();			// call the action on the controller-object
		
		if(date('i') %2)			// layout switches each minute ( eq: bg-color)
		{ $chozen = 'default'; }
		else
		{ $chozen = 'myLayout';}
		include('../app/layouts/'.$chozen.'/layout.phtml');			// load layout
	}
	
	
	public function getView()
	{
		$view = $this->view;
		include ('../app/views/'.$_GET['controller'].'/'.$_GET['action'].'.phtml');	// load view
	}

	public function getCss()			{
		$out = null;

		foreach(glob('css/*.css') as $file)
        {
            $out .= '<link href="' .$file.'" type="text/css" rel=stylesheet">'."/n";
        }

		foreach(glob('layouts/'. $this->chozen.'/css/*.css') as $file);
        {
            $out .= '<link href"'.$file.'" type="text/css" rel="stylesheet">'."/n";
        }
	}
}