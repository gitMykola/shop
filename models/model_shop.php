<?
require_once 'core\database\Query.php';
class Shop {
	
	public $table;
	
	function __construct()
		{
			$this->table = strtolower(get_class($this)).'s';
		}
	public function getAll($page_num = 1, $elem_count = 0)
		{
			return Query::getAll($this->table, $page_num, $elem_count);		
		}
	public function get(int $id)
		{
			return Query::get($this->table, $id);
		}
	public function create($data)
	{
		return Query::create($this->table, $data);
	}	
	public function set(int $id, array $data)
		{
			return Query::set($this->table, $id, $data);
		}
	public function findByName(string $name)
		{
			return Query::findByName($this->table, $name);
		}		
}

