<?php 
Class Route
{
	static function start(){
		
		//...
		session_start();
		
		//include configuration array
        $configuration = array();
		include_once 'config\config.php';
		//var_dump($configuration['application']['default_lang']);
		//look in request
		$request = explode('/', $_SERVER['REQUEST_URI']);
		
		//set lang
		$lang_key = self::InitLang($request,$configuration['application']['default_lang']);
		
		//set default configuration
		//$def_controller = $configuration['application']['default_controller'];
		//$def_action = $configuration['application']['default_action'];
		//$def_user = $configuration['application']['default_user'];
		
		//echo $lang_key."<br>".strtolower($request[1])."<br>";
		//var_dump($request);
		if($lang_key == strtolower($request[1]))$request_shift = array_shift($request);
		//var_dump($request);
		//Is it correct to use $request after shifting via $requets_shift????? But it's work!
		$run = self::InitController($request,$configuration['application']);
		if($run !== false)
		{
			if(!self::RunController($run, $lang_key))die;
		}else self::Redirect($configuration['application']['site_url'].'/'.$lang_key);
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
	function InitController($request,$config){
	    $view_path = $config['view_path'];
		if(file_exists($view_path))include $view_path;else return false;
		
		$model_name = $config['model_prefix'].$config['default_controller'];
		$model_file = $model_name.'.php';
		$model_path = $config['model_path'].$model_file;
		if(file_exists($model_path))include $model_path;else return false;
		
		$controller = $config['controller_prefix'].((count($request) > 1 && self::ValidateController($request[1]))?$request[1]:$config['default_controller']);
		$action = $config['action_prefix'].((count($request) > 2 && self::ValidateAction($request[2]))?$request[2]:$config['default_action']);
		
		$controller_file = $controller.'.php';
		$controller_path = $config['controller_path'].$controller_file;
				
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

