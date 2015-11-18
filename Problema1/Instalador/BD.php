<?php

// Datos de configuraci髇n.
include_once '\\..\\Modelo\\datosServidor.php';
/* Clase encargada de gestionar las conexiones a la base de datos */
Class Database {

	private $link;
	private $result;
	private $regActual;

	private static $_instance;

	/*La funci贸n construct es privada para evitar que el objeto pueda ser creado mediante new*/
	private function __construct(){

		$this->Conectar($GLOBALS['db_conf']);//le pasamos la base de datos
	}

	/*Evitamos el clonaje del objeto. Patron Singleton*/
	private function __clone(){ }

	/*Funci贸n encargada de crear, si es necesario, el objeto. Esta es la funcion que debemos llamar desde fuera de la clase para instanciar el objeto, y as铆, poder utilizar sus m茅todos*/
	public static function getInstance(){
		if (!(self::$_instance instanceof self)){
			self::$_instance=new self();
		}
		return self::$_instance;
	}

	/*Realiza la conexi贸n a la base de datos.*/
	private function Conectar($conf)
	{
		if (! is_array($conf))
		{
			echo "<p>Faltan parametros de configuraci髇</p>";
			var_dump($conf);
			// Puede que no se requiera ser tan 'expeditivos' y que lanzar una excepcion sea mas versatil
			exit();
		}
		$this-> link =new mysqli($conf['servidor'], $conf['usuario'], $conf['password']);

		/* check connection */
		if (! $this->link ) {
			printf("Error de conexion: %s\n", mysqli_connect_error());
			// Puede que no se requiera ser tan 'expeditivos' y que lanzar una excepcion sea mas versatil
			exit();
		}

		$this->link->select_db($conf['base_datos']);
		$this->link->query("SET NAMES 'utf8'");
	}

	/**
	 * Ejecuta una consulta SQL y devuelve el resultado de esta
	 * @param string $sql
	 * @return mixed
	 */
	public function Consulta($sql)
	{
		$this->result=$this->link->query($sql);
		if (! $this->result ) {
			$this->ShowError();
		}
		return $this->result;
	}

	public function ShowError()
	{
		echo "<p>Error: ".$this->link->error."</p>";
		die();
	}

	public function Insertar($tabla, $registro){

		$values=array();

		$campos=array();

		foreach($registro as $campo => $valor)
		{
			$values[]='"'.addslashes($valor).'"';
			$campos[]='`'.$campo.'`';
		}
		$sql = "INSERT INTO `".$tabla."`(".implode(',', $campos).") VALUES (".implode(',', $values).");";
		$res=$this->link->query($sql);

		return $res;


	}

	/**
	 * Devuelve el siguiente registro del result set devuelto por una consulta.
	 *
	 * @param mixed $result
	 * @return array | NULL
	 */
	public function LeeRegistro($result=NULL)
	{
		if (! $result)
		{
			if (! $this->result)
			{
				return NULL;
			}
			$result=$this->result;
		}
		$this->regActual=$result->fetch_assoc();//Cambiado fetch_array --> fetch_row para que solo lo indexe por numero
		return $this->regActual;
	}

	/**
	 * Devuelve el 煤ltimo registro leido
	 */
	public function RegistroActual()
	{
		return $this->regActual;
	}

	/**
	 * Devuelve el valor del 煤ltimo campo autonum茅rico insertado
	 * @return int
	 */
	public function LastID()
	{
		return $this->link->insert_id;
	}

	/**
	 * Devuelve el primer registro que cumple la condici贸n indicada
	 * @param string $tabla
	 * @param string $condicion
	 * @param string $campos
	 * @return array|NULL
	 */
	public function LeeUnRegistro($tabla, $condicion, $campos='*')
	{
		$sql="select $campos from $tabla where $condicion limit 1";
		$rs=$this->link->query($sql);
		if($rs)
		{
			return $rs->fetch_array();
		}
		else
		{
			return NULL;
		}
	}
	/**
	 * Actualiza un registro utilizando SQL
	 * @param unknown $table
	 * @param unknown $fields
	 * @param unknown $values
	 * @param string $where
	 * @param string $query
	 * @return boolean
	 */
	public function update( $table, $where = '1=1', $query = 'main' ) {

		$return = false;
		$values=array();
		$campos=array();
		 
		foreach($registro as $campo => $valor)
		{
			$values[]='"'.addslashes($valor).'"';
			$campos[]='`'.$campo.'`';
		}

		if (!$table) {
			throw new Exception("Los milagros a Lourdes");
		}
		$qry = 'UPDATE ' . $table . ' SET ';
		$tot = count( $campos );
		for ($ct=0;$ct<$tot;$ct++) {
			if ($ct > 0)
				$qry .= ', ';
			$qry .= $campos[$ct] . '=' . '"' . $values[$ct] . '"';
		}
		$qry .= ' ' . $where;
		$return = $this->Consulta( $qry, $query );

		return $return;

	}
	function BorrarUnRegistro($table,$id)
	{
		$query="DELETE  FROM ".$table." where idtarea=".$id.";";
		$this->Consulta($query);
	}
	
	function Actualizar_UnCampo($table,$id,$campo,$nuevovalor,$referencia)
	{
		
			$query="UPDATE ". $table ." SET ". $campo." = '".$nuevovalor."' WHERE " .$referencia." = ".$id.";";
			echo $query;
			$this->Consulta($query);
	}
		
}