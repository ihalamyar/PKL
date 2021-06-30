<?php
namespace App\database;

class Database
{
    public $conn;
    protected $query;
    protected $query_closed = TRUE;
    public $query_count = 0;
    protected $error = TRUE;
    private static $instance = null;
    public function __construct(
        $dbhost = 'localhost',
        $dbuser = 'root',
        $dbpass = '',
        $dbname = 'thesis',
        $charset = 'utf8'
    ) {
        try {
            $this->conn =  new \MySQLi($dbhost, $dbuser, $dbpass, $dbname, '3307');
            if (!$this->conn) {
                return false;
            }
        } catch (\mysqli_sql_exception $th) {
            die("Unfortunately, the details you entered for conn are incorrect!" . $th->getMessage());
        }
        $this->conn->set_charset($charset);
    }
    public static function getInstance()
    {
        if (!self::$instance instanceof self) {
            self::$instance = new Database;
        }
        return self::$instance;
    }
    public function getConnection()
    {
        return $this->conn;
    }
    public function __clone()
    {
        trigger_error('Clone is not allowed.', E_USER_ERROR);
    }

    public function __wakeup()
    {
        trigger_error('Deserializing is not allowed.', E_USER_ERROR);
    }
    // Insert data
	public function insert($query){
        $insert_row = $this->conn->query($query) or die($this->conn->error.__LINE__);
        if($insert_row){
            return $insert_row;
        } else {
            return false;
        }
      }
      // Select or Read data
	public function select($query){
		$result = $this->conn->query($query) or die($this->conn->error.__LINE__);
		if($result->num_rows > 0){
			return $result;
		} else {
			return false;
		}
	}
    public function query($query)
    {
        $result = array();
        $result = $this->conn->query($query) or die($this->conn->error . __LINE__);
        if ($result->num_rows > 0) {
            return $result;
        } else {
            return false;
        }
        $this->query_closed = TRUE;
        return $result;
    }
    public function get_by_id($table, $id)
    {
        $sql = $this->query("SELECT * FROM $table WHERE id = $id ");

        if (!empty($sql) && $sql->num_rows > 0) {
            $row = $sql->fetch_assoc();
            return $row[] = $sql;
        } else {
            return null;
        }
        
        $this->query_closed = TRUE;
    }

    public function bindQueryParams($stmt, $paramType, $paramArray = array())
    {
        $paramValueReference[] = & $paramType;
        for ($i = 0; $i < count($paramArray); $i ++) {
            $paramValueReference[] = & $paramArray[$i];
        }
        call_user_func_array(array(
            $stmt,
            'bind_param'
        ), $paramValueReference);
    }
    public function getSelect($query, $paramType = "", $paramArray = array())
    {
        $stmt = $this->conn->prepare($query);

        if (! empty($paramType) && ! empty($paramArray)) {

            $this->bindQueryParams($stmt, $paramType, $paramArray);
        }
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $resultset[] = $row;
            }
        }

        if (! empty($resultset)) {
            return $resultset;
        }
    }


    public function error($error)
    {
        if ($this->error) {
            exit($error);
        }
    }
    public function numRows() {
		
	}
    public function close()
    {
        return $this->conn->close();
    }
}
