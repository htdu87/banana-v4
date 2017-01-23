<?php
	class idb_helper {
		private $serv_name;
		private $db_name;
		private $usr_name;
		private $pwd;
		private static $inst;
		private $conn;
		
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
		
		public function open_db(){
			@$this->conn = new mysqli($this->serv_name, $this->usr_name,$this->pwd, $this->db_name);
			if($this->conn->connect_error){ //auto handle
				return null;
			}else{
				return $this->conn;
			}
		}
		
		public function execute($stmt){
			if(!$stmt->execute()){
				$bt = debug_backtrace();
				$caller = array_shift($bt);
				error_handler::get_inst()->add_error("Error message: ".$stmt->error);
				error_handler::get_inst()->add_error("File: ".$caller['file']);
				error_handler::get_inst()->add_error("Line number: ".$caller['line']);
				return null;
			}else{
				return $stmt->get_result();
			}
		}
	}
?>