<?
require_once("config.php");

define ( 'DB_HOST', "$dbhost" );
define ( 'DB_USER', "$dbuser" );
define ( 'DB_PASSWORD', "$dbpassword" );
define ( 'DB_DB', "$dbdatabase" );

class ajax_table {
     
  public function __construct(){
	$this->dbconnect();
  }
   
  private function dbconnect() {
    $conn = mysql_connect(DB_HOST, DB_USER, DB_PASSWORD)
      or die ("<div style='color:red;'><h3>Could not connect to MySQL server</h3></div>");
         
    mysql_select_db(DB_DB,$conn)
      or die ("<div style='color:red;'><h3>Could not select the indicated database</h3></div>");
     
    return $conn;
  }
   
  function getRecords(){
	$this->res = mysql_query("select * from po_details where col_code='".$_SESSION['colcode']."'");
	if(mysql_num_rows($this->res)){
		while($this->row = mysql_fetch_assoc($this->res)){
			$record = array_map('stripslashes', $this->row);
			$this->records[] = $record; 
		}
		return $this->records;
	}
	//else echo "No records found";
  }	

  function save($data){
	if(count($data)){
		$values = implode("','", array_values($data));
		
		if(1) return time();
		return 0;
	}
	else return 0;	
  }	

  function delete_record($id){
	 if($id){
		return 1;
	 }
  }	

  function update_record($data){
	if(count($data)){
		$id = $data['rid'];
		unset($data['rid']);
		$values = implode("','", array_values($data));
		$str = "";
		foreach($data as $key=>$val){
			$str .= $key."='".$val."',";
		}
		$str = substr($str,0,-1);
		
		if(1) return $id;
		return 0;
	}
	else return 0;	
  }	

  function update_column($data){
	if(count($data)){
		$id = $data['rid'];
		unset($data['rid']);
		if(1) return $id;
		return 0;
		
	}	
  }

  function error($act){
	 return json_encode(array("success" => "0","action" => $act));
  }

}
?>