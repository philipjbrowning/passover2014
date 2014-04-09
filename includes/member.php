<?php
// If it's going to need the database, then it's 
// probably smart to require it before we start.
require_once('database.php');

class Member {
	
	protected static $table_name="members";
	protected static $db_fields = array('id','first_name','middle_name','last_name','gender','birth_date','zion_name','life_number','cell_phone','address','city','state','zip_code','branch1','branch2','register_time','late_registration','confirmed','comments'); // home_phone previously used
	
	public $id;
	public $first_name;
	public $middle_name;
	public $last_name;
	public $gender; 
	public $birth_date;
	// public $baptism_date; (NOT USED NOW)
    public $zion_id = 0;
	public $zion_name;
    public $late_registration = 'F';
	public $life_number;
	// public $home_phone; (NOT USED NOW)
	public $cell_phone;
	public $address;
	public $city;
	public $state;
	public $zip_code;
	public $branch1;
	public $branch2;
	// public $branch3; (NOT USED NOW)
	private $register_time = "0000-00-00 00:00:00";
	public $registerer_id = 0;
	public $confirmed = 'F';
	public $confirmed_id;
	public $comments;

    // PUBLIC FUNCTIONS ------------------------------------------------------------------------------------------------
	
	public function confirm($user_id) {
        $this->confirmed = 'T';
        $sql = 'UPDATE `passover2014`.`members`
                SET `confirmed` = "'.$this->confirmed.'",
                    `confirmed_id` = '.$user_id.'
                WHERE `members`.`id` = '.$this->id.';';
        global $database;
        $database->open_connection();
        $result = $this->update($sql);
        if (!$result) {
            $this->confirmed = 'F';
        }
        return $result;
    }
	
	public function get_full_name() {
		if(isset($this->first_name) && isset($this->middle_name) && isset($this->last_name)) {
			return $this->first_name . " " . $this->middle_name. " " . $this->last_name;
		} elseif(isset($this->first_name) && isset($this->last_name)) {
			return $this->first_name . " " . $this->last_name;
		} else {
			return "";
		}
	}
	
	public function get_id() {
		return $this->id;
	}

    public function get_register_time() {
        return $this->register_time;
    }

    public function is_confirmed() {
        return ($this->confirmed == 'T') ? true : false;
    }

    public function is_registered() {
        return ($this->register_time == "0000-00-00 00:00:00") ? false : true;
    }

    public function register($user_id) {
        $this->set_register_time();
        $sql = 'UPDATE `passover2014`.`members`
        SET `register_time` = "'.$this->register_time.'",
            `registerer_id` = '.$user_id.',
            `late_registration` = "'.$this->late_registration.'"
        WHERE `members`.`id` = '.$this->id.';';
        global $database;
        $database->open_connection();
        $result = $this->update($sql);
        if (!$result) {
            $this->register_time = '0000-00-00 00:00:00';
        }
        $database->close_connection();
        return $result;
    }

    /*
     * Description:     Creates a new member in the database or updates the member
     * Preconditions:   New members have no $this->id, Old members have $this->id
     * Postconditions:  (int > 0) The new/existing $id of the member
     *                  (bool) false, 0, if errors occurred
     */
	public function save() {
        global $database;
        $result = null;
        // A new record won't have an id yet.
        $database->open_connection();
        if (isset($this->id)) {
            $this->sanitize_attributes();
            $result = $this->update_member();
        } else {
            $this->sanitize_attributes();
            $result = $this->create_member();
        }
        $database->close_connection();
        return $result;
	}

    public function select_member($new_id) {
        $sql  = 'SELECT `members`.`id`, `members`.`first_name`, `members`.`middle_name`, `members`.`last_name`,
				 `members`.`gender`, `members`.`birth_date`, `members`.`zion_id`, `zions`.`name` AS `zion_name`,
				 `members`.`life_number`, `members`.`cell_phone`, `members`.`address`, `members`.`city`,
				 `members`.`state`, `members`.`zip_code`, `members`.`branch1`, `members`.`branch2`,
				 `members`.`register_time`, `members`.`late_registration`, `members`.`confirmed`, `members`.`comments`
				 FROM `members`
				 INNER JOIN `zions`
				 ON `members`.`zion_id` = `zions`.`id`
				 WHERE `members`.`id` ='.$new_id;
        $result_set = $this->select($sql);
        foreach($result_set as $attribute => $value) {
            if ($this->has_attribute($attribute)) {
                $this->$attribute = $value;
            }
        }
    }

    public function set_register_time() {
        $this->register_time = date("Y-m-d H:i:s");
    }
	
	// PRIVATE AND PROTECTED -------------------------------------------------------------------------------------------

    /*
     * Description:     Creates a new member in the database, adding a new zion to the database if neccesary
     * Preconditions:   $this->id is not set
     * Postconditions:  (int > 0) The new/existing $id of the member
     *                  (bool) false, 0, if errors occurred
     */
	private function create_member() {
        $this->save_zion();

		// create member
        $sql = 'INSERT INTO `passover2014`.`members` (`id`, `first_name`, `middle_name`, `last_name`, `gender`,
                    `birth_date`, `zion_id`, `life_number`, `cell_phone`, `branch1`, `branch2`, `register_time`,
                    `registerer_id`, `late_registration`, `confirmed`, `comments`
                ) VALUES (
                    NULL, "'.$this->first_name.'", "'.$this->middle_name.'", "'.$this->last_name.'", "'.$this->gender.'",
                    "'.$this->birth_date.'", '.$this->zion_id.', "'.$this->life_number.'", "'.$this->cell_phone.'",
                    "'.$this->branch1.'", "'.$this->branch2.'", "'.$this->register_time.'", "'.$this->registerer_id.'",
                    "'.$this->late_registration.'", "'.$this->confirmed.'", "'.$this->comments.'"
                )';
        $this->id = $this->insert($sql);
        return $this->id;
	}

    private function create_zion() {
        $sql = 'INSERT INTO `passover2014`.`zions` (`id`, `name`, `local`) VALUES (NULL, "'.$this->zion_name.'", "F");';
        return $this->insert($sql);
    }

    /*
     * Description:     Determines whether a zion is saved in MySQL and returns the ID
     * Preconditions:   None
     * Postconditions:  (int) Returns id of the zion
     *                  (bool) Returns false if no zion found
     */
    private function get_zion_id_from_name() {
        $sql = 'SELECT `id` FROM `zions` WHERE `name` LIKE "'.$this->zion_name.'";';
        if ($result_set = $this->select($sql)) {
            return $result_set->id;
        } else {
            return false;
        }
    }

    private function save_zion() {
        if ((!isset($this->zion_id) || ($this->zion_id == '')) && (isset($this->zion_name) || ($this->zion_name != ''))) {
            // Convert letters all to uppercase
            $this->zion_name = strtoupper($this->zion_name);
            // Create zion if neccesary
            $this->zion_id = $this->get_zion_id_from_name();
            if (!$this->zion_id) {
                $this->zion_id = $this->create_zion();
            }
        }
    }

    private function update_member() {
        $this->save_zion();

        $sql  = 'UPDATE `passover2014`.`members`
                 SET `first_name` = "'.$this->first_name.'",
                     `middle_name` = "'.$this->middle_name.'",
                     `last_name` = "'.$this->last_name.'",
                     `gender` = "'.$this->gender.'",
                     `birth_date` = "'.$this->birth_date.'",
                     `zion_id` = "'.$this->zion_id.'",
                     `life_number` = "'.$this->life_number.'",
                     `cell_phone` = "'.$this->cell_phone.'",
                     `address` = "'.$this->address.'",
                     `city` = "'.$this->city.'",
                     `state` = "'.$this->state.'",
                     `zip_code` = "'.$this->zip_code.'",
                     `branch1` = "'.$this->branch1.'",
                     `branch2` = "'.$this->branch2.'",
                     `register_time` = "'.$this->register_time.'",
                     `late_registration` = "'.$this->late_registration.'",
                     `confirmed` = "'.$this->confirmed.'",
                     `comments` = "'.$this->comments.'"
                 WHERE `members`.`id` = '.$this->id;
        return $this->update($sql);
    }

    protected function sanitize_attributes() {
        global $database;
        // sanitize the values before submitting
        // Note: does not alter the actual value of each attribute
        foreach (self::$db_fields as $field) {
            $this->$field = strtoupper($database->escape_value($this->$field));
        }
    }

	protected function has_attribute($attribute) {
		return in_array($attribute, self::$db_fields);
	}


    protected function insert($sql) {
        global $database;
        $result_set = false;
        if ($database->query($sql)) {
            $result_set = $database->get_insert_id();
        }
        return $result_set;
    }

    protected function select($sql) {
        global $database;
        $result_set = null;
        if ($result = $database->query($sql)) {
            $result_set = mysqli_fetch_object($result);
        }
        return $result_set;
    }

    protected function update($sql) {
        global $database;
        $result_set = false;
        if ($result = $database->query($sql)) {
            $result_set = $result;
        }
        return $result_set;
    }
}