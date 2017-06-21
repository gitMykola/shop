<?
namespace Core\Database\Model
{
	class Model {
		
		public $table;
		public $data;
		
		function __construct()
		{
			$this->table = strtolower(get_class($this)).'s';
		}
		function public getAll()
		{
			return $this->data;		
		}
		function public get($id)
		{
			return $this->data;
		}
		function public set($id,$data)
		{
			return true;
		}
		function public findByName($name)
		{
			return (int);
		}		
	}
}	

