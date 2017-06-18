<?php 
Class Route
{
	static function start(){
		
		//...
		session_start();
		
		//include configuration array
		require_once 'config/config.php';
		
		//look in request
		$request = explode('/', $_SERVER['REQUEST_URI']);
		
		//set lang
		$lang_key = self::InitLang($request,$configuration['application']['default_lang']);
		
		//set default configuration
		$def_controller = $configuration['application']['default_controller'];
		$def_action = $configuration['application']['default_action'];
		
		//echo $lang_key."<br>".strtolower($request[1])."<br>";
		//var_dump($request);
		if($lang_key == strtolower($request[1]))$request_shift = array_shift($request);
		//var_dump($request);
		
		$run = self::InitController($request,$def_controller,$def_action);
		if($run !== false)
		{
			if(!self::RunController($run, $lang_key))die;
		}else die;		
	}
	function RunController($run,$lang){
		$controller = new $run['controller']($lang);
		$action = $run['action'];
		
		if(method_exists($controller, $action))
		{
			$controller->$action();
			return true;
		}	
		return false;
	}
	function InitController($request,$controller_name,$action_name){
		$view_file = 'view.php';
		$view_path = "views/".$view_file;
		if(file_exists($view_path))include $view_path;else return false;
		
		$model_name = 'model_'.$controller_name;
		$model_file = $model_name.'.php';
		$model_path = "models/".$model_file;
		if(file_exists($model_path))include $model_path;else return false;
		
		$controller = 'controller_'.((self::ValidateController($request[1]))?$request[1]:$controller_name);
		$action = 'action_'.((self::ValidateAction($request[2]))?$request[2]:$action_name);
		
		$controller_file = $controller.'.php';
		$controller_path = "controllers/".$controller_file;
				
		if(file_exists($controller_path))include $controller_path;else return false;
		
		return array('controller' => $controller,'action' => $action);
	}
	function ValidateController($controller){
		//make additional validate by existing controllers
		if(strlen($controller) > 2 && strlen($controller) < 20)return true;
		return false;
	}
	function ValidateAction($action){
		if (strlen($action) > 0 && strlen($action) < 20)return true;
		return false;
	}
	function InitLang($request,$default_lang){
		if(is_array($request) && strlen($request[1]) == 2) 
			{
				switch(strtolower($request[1]))
						{
							case 'ru':
							return 'ru';
							case 'ua':
							return 'ua';
							default:
							return $default_lang;
						}
			}else return $default_lang;
	}
	function Redirect($url){
		header("Location: http://".$url);
		die;
	}
	function Error404(){
		$host = 'http://'.$_SERVER['HTTP_HOST'].'/';
        header('HTTP/1.1 404 Not Found');
		header("Status: 404 Not Found");
		header('Location:'.$host.'404');
		echo 'Sorry... There are no page found.';
	}
}

