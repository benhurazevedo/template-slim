<?php 
namespace dbService;
use \PDO;
class ConectorDAO
{
	private $con;
	function __construct($dsn, $database_user, $db_password)
	{
		$this->con = new PDO($dsn, $database_user, $db_password);
		$this->con->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
	}
	public function getConn()
	{
		return $this->con;
	}
}
?>