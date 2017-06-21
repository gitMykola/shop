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
			$config = Config::set();
			$page_num = (isset($_GET['page_num']) && is_int(1 + $_GET['page_num']))?$_GET['page_num']:1;//echo 'Page_num = '.$_GET['page_num'];var_dump($_GET);
			$elem_count = (isset($_GET['elem_count']) && is_int(1 + $_GET['elem_count']))?$_GET['elem_count']:$config['application']['default_paging_elements'];
			$this->view->generate('template_'.strtolower(get_class($this->model)).'.php', $this->view->placeholders, $this->model->getAll($page_num, $elem_count));
		}
	function action_test()
		{
			echo "Test OK! <br>";
			var_dump($_REQUEST);
		}
	function action_new()
		{
			$this->view->generate('template_new_'.strtolower(get_class($this->model)).'.php', $this->view->placeholders, $data['id'] = '');
		}
	function action_create()
	{
		$this->view->generate('template_new_'.strtolower(get_class($this->model)).'.php', $this->view->placeholders, $this->model->create($_POST));
	}	
}

