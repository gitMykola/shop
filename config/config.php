<?php 
//namespace config
//{
	class Config
	{
		static function set()
		{
			return array (
				'database' => array(
					'host' => 'localhost',
					'dbname' => 'sample',
					'user' => 'root',
					'password' => '',
					'engine' => '',
				),
				'application' => array(
					'site_url' => 'shop.f16.od.ua',
					'view_path' => 'views/view.php',
					'model_path' => 'models/',
					'controller_path' => 'controllers/',
					'default_lang' => 'en',
					'default_controller' => 'shop',
					'default_action' => 'start',
					'default_user' => 'guest',
					'model_prefix' => 'model_',
					'controller_prefix' => 'controller_',
					'action_prefix' => 'action_',
					'default_paging_elements' => '5',
					'max_elem_count' => '1000',
				),
			);
		}	
	}
//}