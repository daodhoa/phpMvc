<?php
/**
 * connect to database
 */
class DBConnection
{
	private $servername;
	private $username;
	private $password;
	private $dbname;

	private $conn = NULL;

	public function __construct()
	{
		$this->servername = 'localhost';
		$this->username = 'root';
		$this->password = '123456';
		$this->dbname = 'mvc';
	}

	public function connect()
	{
		$this->conn = new mysqli($this->servername, $this->username, $this->password, $this->dbname);
		if($this->conn->connect_error){
			echo "Kết nối thất bại";
			exit();
		}
		else{
			mysqli_set_charset($this->conn, 'utf8');
		}
		return $this->conn;
	}


// functions about admin
	public function getAllAdmin()
	{
		$sql = "select * from admin";
		$result = $this->conn->query($sql);
		if($result->num_rows> 0){
			while ($rows = mysqli_fetch_assoc($result)) {
				$array[] = $rows;
			}
			return $array;
		}
		return NULL;
	}

	public function insertAdmin($username, $password, $name)
	{
		$sql = "insert into admin (username, password, name) values ('".$username."', '".$password."', '".$name."')";

		if ($this->conn->query($sql) === TRUE) {
    		echo "Thêm mới thành công";
		} 
		else {
   			echo "Thêm mới thất bại! Error: " . $sql . "<br>" . $this->conn->error;
		}
	}

	public function deleteAdmin($admin_id)
	{
		$sql= "delete from admin where admin_id = ".$admin_id;

		if($this->conn->query($sql)){
			echo "Đã xóa thành công";
		}else{
			echo "Có lỗi khi xóa! Error :".$sql. "<br/>" .$this->error;
		}
	}
}
?>