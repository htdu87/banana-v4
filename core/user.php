<?php
	class user{
		private $usr;
		private $uid;
		private $name;
		private $email;
		private $rid;
		
		function __construct(){
			$this->usr = "";
			$this->uid = -1;
			$this->name = "";
			$this->email = "";
			$this->rid = -1;
		}
		
		public function set_username($usr){
			$this->usr = $usr;
		}
		public function set_userid($uid){
			$this->uid = $uid;
		}
		public function set_name($name){
			$this->name = $name;
		}
		public function set_email($email){
			$this->email = $email;
		}
		public function set_rid($rid){
			$this->rid = $rid;
		}
		
		public function get_username(){
			return $this->usr;
		}
		public function get_userid(){
			return $this->uid;
		}
		public function get_name(){
			return $this->name;
		}
		public function get_email(){
			return $this->email;
		}
		public function get_rid(){
			return $this->rid;
		}
	}
?>