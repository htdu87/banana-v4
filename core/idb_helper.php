<?php
	class idb_helper {
		private $serv_name;
		private $db_name;
		private $usr_name;
		private $pwd;
		private static $inst;
		
		private function __construct(){
			$this->serv_name = config::get_inst()->get_server_name();
			$this->db_name = config::get_inst()->get_db_name();
			$this->usr_name = config::get_inst()->get_username();
			$this->pwd = config::get_inst()->get_password();
		}
		
		public static function get_inst(){
			if(self::$inst == null)
				self::$inst = new self();
			return self::$inst;
		}
		
		private function open_db(){
			$conn = new mysqli($this->serv_name, $this->usr_name,$this->pwd, $this->db_name);
			if($conn->connect_error){
				error_handler::get_inst()->add_error($conn->connect_error);
				return null;
			}else{
				return $conn;
			}
		}
	}
?>