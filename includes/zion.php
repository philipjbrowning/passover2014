<?php
// If it's going to need the database, then it's 
// probably smart to require it before we start.
require_once(LIB_PATH.DS.'database.php');

class Zion {
	
	protected static $table_name="zions";
	protected static $db_fields = array('id','name','local');
	
	private $id;             // int
	private $local = false;  // bool (All local zions are in the database already. Can be set to true by query.)
	public  $name;           // string
	
	
	// -----------------------
	// Public Methods
	// ------------------------
	
	
	/* Description:     Allows access to the id. The user cannot set the id
	 * Preconditions:   None
	 * Postconditions:  (int) If id is set
	 *                  (null) If id is not set
	 */
	public function get_id() {
		return $this->id;
	}
	
	
	/* Description:     Allows access to the local. The user cannot set locality
	 * Preconditions:   None
	 * Postconditions:  (bool) Return true or false
	 */
	public function get_local() {
		return $this->local;
	}
	
	
	/* Description:     Sets this Zion object with name and local (true, false) data
	 * Preconditions:   None
	 * Postconditions:  (true) If succesfully set the object's informaiton
	 *                  (false) If the information was not found in the database
	 */
	public function get_zion_with_id($find_id) {
		// Require numeric input
		if (!is_numeric($find_id)) {
			return false;
		}
		
		// Track success or failure of the query
		$found_success = false;
		
		// Query the Zion table
		global $database;
		$database->open_connection();
        $sql = "SELECT `name`,`local` FROM `".self::$table_name."` WHERE `id`=$find_id";
		if($result = $database->query($sql)) {
            $found_zion = mysqli_fetch_object($result);
			$this->id = $find_id;
			$this->name = $found_zion->name;
			$this->local = $found_zion->local;
			$found_success = true;
		}
		
		// Close connection
		$database->close_connection();
		return $found_success;
	}
	
	/* Description:     Saves or updates the Zion based on if it has an ID
	 * Preconditions:   None
	 * Postconditions:  update(), if $this->id is set
	 *                  create(), if $this->id is not set
	 */
	public function save() {
		// A new record won't have an id yet.
		return isset($this->id) ? $this->update() : $this->create();
	}
	
	
	// ----------------------
	// Private Methods
	// ----------------------
	
	
	/* Description:     x
	 * Preconditions:   x
	 * Postconditions:  x
	 *                  x
	 */
	protected function create() {
		global $database;
		$database->open_connection();
		// Don't forget your SQL syntax and good habits:
		// - INSERT INTO table (key, key) VALUES ('value', 'value')
		// - single-quotes around all values
		// - escape all values to prevent SQL injection
		$db_name = strtoupper($database->escape_value($this->name));
		$db_local;
		if ($this->local) {
			$db_local = 'TRUE';
		} else {
			$db_local = 'FALSE';
		}
		$create_sql = 'INSERT INTO '.self::$table_name.' (`id`,`name`,`local`) VALUES (NULL,"'.$db_name.'","'.$db_local.'");';
		$create_success = false;
		if($database->query($create_sql)) {
			$this->id = $database->insert_id();
			$create_success = true;
		}
		$database->close_connection();
		return $create_success;
	}
	
	/* Description:     x
	 * Preconditions:   x
	 * Postconditions:  x
	 *                  x
	 */
	protected function update() {
		return false;
	}
}

?>