<?php
// If it's going to need the database, then it's 
// probably smart to require it before we start.
require_once(LIB_PATH.DS.'database.php');

class MemberInList {
    public $id;
    public $first_name;
    public $middle_name;
    public $last_name;
    public $gender;
    public $birth_date;
    public $zion_name;
    public $life_number;
    public $home_phone;
}

class Members {
	
	protected static $table_name="members";
    protected static $db_fields = array('id','first_name','middle_name','last_name','gender','birth_date','zion_name','life_number','home_phone');
	
    public $list; // array of MemberInList objects

    public function listMembers($user_id=0, $search_string="", $search_group="All", $order_by="first_name", $asc_desc="ASC", $offset=0, $row_count=25) {
        global $database;
        $database->open_connection();
        $search_string = $database->escape_value($search_string);
        $whereUsed = false;

        $sql  = "SELECT `id`, `first_name`, `middle_name`, `last_name`, `life_number`, `gender`, `birth_date`, ".
            "`baptism_date`, `zion_name`, `home_phone`, `branch1`, `register_time`, `confirmed` ".
            "FROM `member_search` ";
        if ($search_string != '') {
            $sql .= "WHERE (`first_name` like '%{$search_string}%' ";
            $sql .= "OR `middle_name` like '%{$search_string}%' ";
            $sql .= "OR `last_name` like '%{$search_string}%' ";
            $sql .= "OR CONCAT(first_name, middle_name, last_name) like '%{$search_string}%' ";
            $sql .= "OR CONCAT(first_name, last_name) like '%{$search_string}%' ";
            $sql .= "OR life_number like '%{$search_string}%' ";
            // Determines if a date has been input in format 00-00-0000 or 0-0-00
            if(preg_match("/^[0-9]{1,2}-[0-9]{1,2}-[0-9]{2,4}$/", $search_string, $datebit)) {
                list ($month, $day, $year) = explode('-', $search_string);
                if (($year >= 0) && ($year <= 14)) { // If the year is 00 to 14, it means 2000 to 2014
                    $year = "20".$year;
                } else if (($year >= 15) && ($year <= 99)) { // If the year is 15 to 99, it means 1915 to 1999
                    $year = "19".$year;
                }
                $sql .= "OR `birth_date` like '%{$year}-{$month}-{$day}%' ";
                $sql .= "OR `baptism_date` like '%{$year}-{$month}-{$day}%' ";
            }
            $sql .= "OR `birth_date` like '%{$search_string}%' ";
            $sql .= "OR `baptism_date` like '%{$search_string}%' ";
            $sql .= "OR `home_phone` like '%{$search_string}%' ";
            $sql .= "OR `cell_phone` like '%{$search_string}%') ";
            $whereUsed = true;
        }
        if ($search_group == "registered") {
            if ($whereUsed == false) {
                $sql .= "WHERE `register_time` != '0000-00-00 00:00:00' AND `local_zion` = 'T' ";
                $whereUsed = true;
            } else {
                $sql .= "AND `register_time` != '0000-00-00 00:00:00' AND `local_zion` = 'T' ";
            }
            if ($user_id > 0) {
                $sql .= "AND `registerer_id` = ".$user_id." ";
            }
        } elseif ($search_group == "confirmed") {
            if ($whereUsed == false) {
                $sql .= "WHERE `confirmed` = 'T' ";
                $whereUsed = true;
            } else {
                $sql .= "AND `confirmed` = 'T' ";
            }
            if ($user_id > 0) {
                $sql .= "AND `confirmed_id` = ".$user_id." ";
            }
        } elseif ($search_group == "visiting") {
            if ($whereUsed == false) {
                $sql .= "WHERE `local_zion` = 'F' ";
                $whereUsed = true;
            } else {
                $sql .= "AND `local_zion` = 'F' ";
            }
            if ($user_id > 0) {
                $sql .= "AND (`registerer_id` = ".$user_id." OR `confirmed_id` = ".$user_id.") ";
            }
        }

        $sql .= "ORDER BY `".$order_by."` ".$asc_desc." ";
        $sql .= "LIMIT ".$offset.",".$row_count.";";

        $result_set = $database->query($sql);
        $database->close_connection();

        return $result_set;
    }


	public function searchForMembers($search_string="", $order_by="first_name", $asc_desc="ASC") {
        global $database;
        $database->open_connection();
        $search_string = $database->escape_value($search_string);

        $sql  = "SELECT `id`, `first_name`, `middle_name`, `last_name`, `life_number`, `gender`, `birth_date`, ".
                "`baptism_date`, `zion_name`, `home_phone`, `branch1`, `register_time`, `confirmed` ".
                "FROM `member_search`";
        $sql .= "WHERE (`first_name` like '%{$search_string}%' ";
        $sql .= "OR `middle_name` like '%{$search_string}%' ";
        $sql .= "OR `last_name` like '%{$search_string}%' ";
        $sql .= "OR CONCAT(first_name, middle_name, last_name) like '%{$search_string}%' ";
        $sql .= "OR CONCAT(first_name, last_name) like '%{$search_string}%' ";
        $sql .= "OR life_number like '%{$search_string}%' ";
        // Determines if a date has been input in format 00-00-0000 or 0-0-00
        if(preg_match("/^[0-9]{1,2}-[0-9]{1,2}-[0-9]{2,4}$/", $search_string, $datebit)) {
            list ($month, $day, $year) = explode('-', $search_string);
            if (($year >= 0) && ($year <= 14)) { // If the year is 00 to 14, it means 2000 to 2014
                $year = "20".$year;
            } else if (($year >= 15) && ($year <= 99)) { // If the year is 15 to 99, it means 1915 to 1999
                $year = "19".$year;
            }
            $sql .= "OR `birth_date` like '%{$year}-{$month}-{$day}%' ";
            $sql .= "OR `baptism_date` like '%{$year}-{$month}-{$day}%' ";
        }
        $sql .= "OR `birth_date` like '%{$search_string}%' ";
        $sql .= "OR `baptism_date` like '%{$search_string}%' ";
        $sql .= "OR `home_phone` like '%{$search_string}%' ";
        $sql .= "OR `cell_phone` like '%{$search_string}%') ";
        $sql .= "ORDER BY `".$order_by."` ".$asc_desc;

        $result_set = $database->query($sql);
        $database->close_connection();

        return $result_set;
	}

    protected function select($sql) {
        global $database;
        $result_set = $database->query($sql);
        return $result_set;
    }


    /*
    // serch member by search string
    public static function search_member($search_string="") {
        global $database;
        $search_string = $database->escape_value($search_string);

        $sql  = "SELECT * FROM ".self::$table_name;
        $sql .= " WHERE (`first_name` like '%{$search_string}%' ";
        $sql .= " OR `middle_name` like '%{$search_string}%' ";
        $sql .= " OR `last_name` like '%{$search_string}%' ";
        $sql .= " OR CONCAT(`first_name`, `middle_name`, `last_name`) like '%{$search_string}%' ";
        $sql .= " OR CONCAT(`first_name`, `last_name`) like '%{$search_string}%' ";
        $sql .= " OR `life_number` like '%{$search_string}%' ";
        // Determines if a date has been input in format 00-00-0000 or 0-0-00
        if(preg_match("/^[0-9]{1,2}-[0-9]{1,2}-[0-9]{2,4}$/", $search_string, $datebit)) {
            list ($month, $day, $year) = explode('-', $search_string);
            if (($year >= 0) && ($year <= 14)) { // If the year is 00 to 14, it means 2000 to 2014
                $year = "20".$year;
            } else if (($year >= 15) && ($year <= 99)) { // If the year is 15 to 99, it means 1915 to 1999
                $year = "19".$year;
            }
            $sql .= " OR `birth_date` like '%{$year}-{$month}-{$day}%' ";
            $sql .= " OR `baptism_date` like '%{$year}-{$month}-{$day}%' ";
        }
        $sql .= " OR `birth_date` like '%{$search_string}%' ";
        $sql .= " OR `home_phone` like '%{$search_string}%' ";
        $sql .= " OR `cell_phone` like '%{$search_string}%') ";
        $sql .= " ORDER BY id DESC ";

        $result_array = self::find_by_sql($sql);
        //return !empty($result_array) ? array_shift($result_array) : false;

        return $result_array;

    }
    */
	

	/*
	public static function all_members($orderby="reg_time", $asc_desc="DESC")
	{
		global $database;
		$orderby  = $database->escape_value($orderby);
		$asc_desc = $database->escape_value($asc_desc);
		
		$sql      = "SELECT * FROM ".self::$table_name." ";
		$sql     .= "ORDER BY {$orderby} {$asc_desc} ;";
		
		$result_array = self::find_by_sql($sql);
		
		return $result_array;		
	}
	// 
	public static function registered_members($id=0, $orderby="reg_time", $asc_desc="DESC")
	{
		global $database;
		$id	      = $database->escape_value($id);
		$orderby  = $database->escape_value($orderby);
		$asc_desc = $database->escape_value($asc_desc);
		
		$sql  = 'SELECT `members`.`first_name`, `members`.`middle_name`, `members`.`last_name`, `members`.`birth_date`, `members`.`life_number`, `members`.`home_phone`, `zions`.`name` AS `zion`, `zions`.`local` ';
		$sql .= 'FROM '.self::$table_name.' ';
		$sql .= 'INNER JOIN `zions` ';
		$sql .= 'ON `members`.`zion_id` = `zions`.`id` ';
		$sql .= 'WHERE `register_time` != "0000-00-00 00:00:00"';
		if ($id > 0) {
			$sql .= "AND registerer_id={$id} ";
		}
		$sql .= "ORDER BY {$orderby} {$asc_desc};";
		
		$database->open_connection();
		$result_set = array();
		if ($result = $database->query($sql)) {
			// fetch associative array
			while ($obj = mysqli_fetch_object($result)) {
				foreach($values_array as $attribute => $value){
			}
			
			// free result set
			mysqli_free_result($result);
		}
		$database->close_connection();
		return $result_set;		
	}

	
	// 
	public static function confirmed_members($id=0, $orderby="reg_time", $asc_desc="DESC")
	{
		global $database;
		$id	= $database->escape_value($id);
		$orderby		= $database->escape_value($orderby);
		$asc_desc	= $database->escape_value($asc_desc);
		
		$sql  = "SELECT * FROM ".self::$table_name." ";
		$sql .= "WHERE confirmed='YES' ";
		if ($id>0) $sql .= "AND registerer={$id} ";
		$sql .= "ORDER BY {$orderby} {$asc_desc} ;";
		
		$result_array = self::find_by_sql($sql);
		
		return $result_array;		
	}

	
	//counter
	public static function count($where="", $user=0) {
		global $database;
		$sql = "SELECT COUNT(*) FROM ".self::$table_name;		
		if($where) $sql.=" WHERE ". $where . "=1";
		if($user>0) $sql.=" AND registerer=".$user;

		
		$result_set = $database->query($sql);
		$row = $database->fetch_array($result_set);
		return array_shift($row);
	}
	
	
	//visitors
	public static function visitors($user=0) {
		global $database;
		
		$sql  = "SELECT * FROM ".self::$table_name." ";
		$sql .= " WHERE visitor = 1 ";
		$sql .= " AND registerer = ".$user;
		$sql .= " ORDER BY confirmed, registered, id DESC ";
		$result_array = self::find_by_sql($sql);		
		return $result_array;
	}
			

	public static function logs($action="", $member=0) {
		global $database;
		
	   $action	= $database->escape_value($action);
	   $member	= $database->escape_value($member);
	   
		$sql = "INSERT INTO logs (user, action, member, log_time) VALUES ";
		$sql .= "(".$_SESSION['user_id'].",'".$action."',".$member.",'". strftime("%Y-%m-%d %H:%M:%S", time())."')";
		
	  if($database->query($sql)) {
	    return true;
	  } else {
	    return false;
	  }
	}

	// Common Database Methods
	
	//---------------
           public static function build($values_array){
           	$object = new self;
           	
              foreach($values_array as $attribute => $value){
             if($object->has_attribute($attribute)){
             	
             	if (is_string($value)) $value = strtoupper($value); //uppercase
             	
              	$object->$attribute = $value;
             }             
           }
           return $object;
           }
   //-----------------  	
	
	
	
	public static function find_all() {
		return self::find_by_sql("SELECT * FROM ".self::$table_name);
  }
  
  public static function find_by_id($id=0) {
    $result_array = self::find_by_sql("SELECT * FROM ".self::$table_name." WHERE id={$id} LIMIT 1");
		return !empty($result_array) ? array_shift($result_array) : false;
  }
  
  public static function find_by_sql($sql="") {
    global $database;
    $result_set = $database->query($sql);
    $object_array = array();
    while ($row = $database->fetch_array($result_set)) {
      $object_array[] = self::instantiate($row);
    }
    return $object_array;
  }

	public static function count_all() {
	  global $database;
	  $sql = "SELECT COUNT(*) FROM ".self::$table_name;
    $result_set = $database->query($sql);
	  $row = $database->fetch_array($result_set);
    return array_shift($row);
	}

	private static function instantiate($record) {
		// Could check that $record exists and is an array
    $object = new self;
		// Simple, long-form approach:
		// $object->id 				= $record['id'];
		// $object->username 	= $record['username'];
		// $object->password 	= $record['password'];
		// $object->first_name = $record['first_name'];
		// $object->last_name 	= $record['last_name'];
		
		// More dynamic, short-form approach:
		foreach($record as $attribute=>$value){
		  if($object->has_attribute($attribute)) {
		    $object->$attribute = $value;
		  }
		}
		return $object;
	}
	
	private function has_attribute($attribute) {
	  // We don't care about the value, we just want to know if the key exists
	  // Will return true or false
	  return array_key_exists($attribute, $this->attributes());
	}

	protected function attributes() { 
		// return an array of attribute names and their values
	  $attributes = array();
	  foreach(self::$db_fields as $field) {
	    if(property_exists($this, $field)) {
	      $attributes[$field] = $this->$field;
	    }
	  }
	  return $attributes;
	}
	
	protected function sanitized_attributes() {
	  global $database;
	  $clean_attributes = array();
	  // sanitize the values before submitting
	  // Note: does not alter the actual value of each attribute
	  foreach($this->attributes() as $key => $value){
	    $clean_attributes[$key] = $database->escape_value($value);
	  }
	  return $clean_attributes;
	}
	
	public function save() {
	  // A new record won't have an id yet.
	  return isset($this->id) ? $this->update() : $this->create();
	}

    */

}

?>