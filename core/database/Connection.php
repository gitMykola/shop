<?
//namespace Core\Database\Query
//{
	class Connection {
		
		public $data = Null;
		
		function __construct()
		{
			//$this->table = strtolower(get_class($this)).'s';
		}
		private function select($table)
		{
			
		}
		public function getAll(string $table)
		{
			$this->data = $this->select($table);
			return $this->data;		
			//echo 'rt';
		}
		public function get(string $table, int $id)
		{
			return $this->data;
		}
		public function set(string $table, int $id, array $data)
		{
			return true;
		}
		public function findByName(string $table, string $name)
		{
			//return (int);
		}		
	}
//}	

