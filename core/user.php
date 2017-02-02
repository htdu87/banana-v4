<?php
	class user{
		private $usr;
		private $uid;
		private $name;
		private $email;
		private $rid;
		private $phone;
		private $avatar;
		private $active;
		private $lock;
		private $vip;
		private $regdate;
		private $lastlogin;
		
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
		public function set_phone($phone){
			$this->phone=$phone;
		}
		public function set_avatar($avatar){
			$this->avatar=$avatar;
		}
		public function set_lock($lock){
			$this->lock=$lock;
		}
		public function set_vip($vip){
			$this->vip=$vip;
		}
		public function set_regdate($regdate){
			$this->regdate=$regdate;
		}
		public function set_lastlogin($lastlogin){
			$this->lastlogin=$lastlogin;
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
		public function get_phone(){
			return $this->phone;
		}
		public function get_avatar(){
			return $this->avatar;
		}
		public function get_lock(){
			return $this->lock;
		}
		public function get_vip(){
			return $this->vip;
		}
		public function get_regdate(){
			return $this->regdate;
		}
		public function get_lastlogin(){
			return $this->lastlogin;
		}
	}
?>