<?php
	class db
	{
		protected static $connection;
		// function connect
		public function connect()
		{
			if(!isset(self::$connection))
			{
				$config=parse_ini_file("config.ini");
				self::$connection = new mysqli($config["servername"],$config["username"],$config["password"],$config["databasename"]);
			}
			if(self::$connection==false)
			{
				return false;
			}
			return self::$connection;
		}

		public function query_execute($querystring)
		{
			$connection=$this->connect();
			$connection->query("SET NAME utf8");
			$result=$connection->query($querystring);
			//$connection->close();
			return $result;
		}

		public function select_to_array($querystring)
		{
			$row=array();
			$result=$this->query_execute($querystring);
			if($result==false)
				return false;
			while($item=$result->fetch_assoc())
			{
				$row[]=$item;
			}
			return $row;
		}
	}
?>
