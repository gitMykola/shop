<?
//namespace Core\Database\Query
//{
	class Query {
		
		//public $data = Null;
		
		function __construct()
		{
			//$this->table = strtolower(get_class($this)).'s';
		}
		private function select($table, $page_num, $elem_count)
		{
			$data['error']['status'] = false;
			$data['error']['text'] = '';
			$cdata = Config::set();
					
					$conn = new mysqli($cdata['database']['host'],$cdata['database']['user'],$cdata['database']['password'],$cdata['database']['dbname']);
					
					if($conn->connect_error)
				{
					$data['error']['status'] = true;
					$data['error']['text'] =  "Error: " . $conn->connect_error;
					return $data;
				}
					$sql = "select * from ".$table." order by id asc";;
					if($elem_count > 0 && $elem_count < $cdata['application']['max_elem_count'])	
					{
						$result = $conn->query($sql);
						$data['data'] = $result->fetch_all(MYSQLI_ASSOC);
						$data['paginator']['page_last'] = (count($data['data'])%$elem_count == 0)?round(count($data['data'])/$elem_count):round(count($data['data'])/$elem_count + 1);
						$sql .= " limit ".($page_num - 1) * $elem_count.", ".$elem_count;
						$data['paginator']['page_num'] = $page_num;
					}
					$result = $conn->query($sql);		
					$data['data'] = $result->fetch_all(MYSQLI_ASSOC);
					$result->close();
					$conn->close();
					
			return $data;	
		}
		private function insert($table, $data)
		{
			$rdata['error']['status'] = false;
			$rdata['error']['text'] = '';
			$cdata = Config::set();
			//var_dump($data);		
					$conn = new mysqli($cdata['database']['host'],$cdata['database']['user'],$cdata['database']['password'],$cdata['database']['dbname']);
					
					if($conn->connect_error)
				{
					$rdata['error']['status'] = true;
					$rdata['error']['text'] =  "Error: " . $conn->connect_error;
					//var_dump($data);
					return $rdata;
				}
					//var_dump($rdata);
					/*echo "insert into ".$table
					." (`".implode("`,`",array_keys($data))."`) values ('".implode("','",$data)."')<br	>";*/
					/*$result = $conn->query("insert into ".$table
					." (`".implode("`,`",array_keys($data))."`) values ('".implode("','",$data)."')");*/
					$sql = "insert into ".$table
					." (`".implode("`,`",array_keys($data))."`) values (";
					for($i = 0;$i < count($data);$i++) (!$i)?$sql .= "?":$sql .= ",?";
					$sql .= ")";
					var_dump($sql);
					$result = $conn->prepare($sql);
					//list($d) = $data;
					var_dump($data);
					//foreach($data as $key => $elem)$result->bind_m("s",$elem);
					//$result->bind_param("array",implode("','",$data));
					
					foreach($data as $elem) $data_types .= (is_int($elem))?"i":((is_double($elem))?"d":"s");
					$bind_param[] = &$data_types;
					foreach($data as $key => $elem)$bind_param[] = &$data[$key];
					call_user_func_array(array($result,'bind_param'), $bind_param);
					$result->execute();
					if(!$result)
					{
						$rdata['error']['status'] = true;
						$rdata['error']['text'] =  "Error: " . $conn->error;
						//var_dump($rdata);
						return $rdata;
					}
					$rdata['id'] = $conn->insert_id;
					//var_dump($data);
					//$result->close();
					$conn->close();
					
			return $rdata;
		}
		public function getAll($table, $page_num, $elem_count)
		{
			$this->data = self::select($table, $page_num, $elem_count);
			return $this->data;		
			//echo 'rt';
		}
		public function get(string $table, int $id)
		{
			return $this->data;
		}
		public function create($table, $data)
		{
			return self::insert($table, $data); 
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

