<?
class controller_shop {
	
	public $model;
	public $view;
	
	function __construct($lang_key)
		{
			$this->model = new Shop;
			$this->view = new View($lang_key);
		}
	function action_start()
		{
			$this->view->generate('template_'.strtolower(get_class($this->model)).'.php', $this->view->placeholders);
		}
	function action_test(){
		echo "Test OK!";
	}	
}

