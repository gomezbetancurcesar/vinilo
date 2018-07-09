<?php
function dateArray($leFecha){
  list($fec,$hor) = explode(' ', $leFecha);
  list($ano, $mes, $dia) = explode('-', $fec);
  return("$dia/$mes/$ano");
}

class Conexion {
	public $hostname = "192.168.1.18";
	public $username = "root";
	public $password = "Nksp.2050!";
	public $database = "scraping_test";
	public $conn;
	
	function __construct(){
		$this->conectar();
	}
	
	public function conectar(){
		$this->conn = new mysqli($this->hostname, $this->username, $this->password, $this->database);
		if ($this->conn->connect_error) {
			die('Error de Conexión (' . $this->conn->connect_errno . ') ' . $this->conn->connect_error);
		}
	}
	
	public function save($opts=array()){
		$tabla = $opts["table"];
		$datos = $opts["data"];
		
		$query = "INSERT INTO $tabla (";
		$query .= implode(", ", array_keys($datos));
		$query .= ") values (";
		foreach($datos as $kD => $dato){
			if(!is_array($dato)){
				if(is_numeric($dato)) $query .= $dato;
				else $query .= "'$dato'";
				
			}else $query .= reset($dato);
			$query .= ", ";
		}
		$query = trim(trim($query), ", ");
		$query .= ")";
		
    $this->conn->query($query);
    $id = $this->conn->insert_id;
		return $id;
	}
	
	public function find($type="all", $opts=array()){
		$tabla = $opts["table"];
		$where = (isset($opts["where"]))?$opts["where"]:array();
		$fields= (isset($opts["fields"]))?$opts["fields"]:"*";
		
		if(is_array($fields)) $fields = implode(", ", $fields);
		$query = "SELECT $fields FROM $tabla";
		if(!empty($where)){
			$query .= " where ";
			foreach($where as $campo => $valor){
				$value = null;
				if(!is_array($valor)){
					if(is_numeric($valor)) $value = $valor;
					else $value = "'$valor'";
					
				}else $value = reset($valor);
				
				$query .= "$campo=$value AND ";
			}
		}
		$query = trim(trim($query), "AND");
		$resource = $this->conn->query($query);
		
		$row = array();
		if($t=$resource->num_rows){
			switch($type){
				case "all":
					while ($fila = $resource->fetch_assoc()) {
						$row[] = $fila;
					}
					break;
				case "first":
					$row = $resource->fetch_assoc();
					break;
			}
		}
		return $row;
	}
}
?>
