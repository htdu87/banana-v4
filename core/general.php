<?php
	class general
	{
		private static $general;
		private $title;
		private $description;
		private $keyword;
		private $image;
		private $footer;
		private $tag;
		private $tel;
		private $heading;
		private $email;
		private $addr;
		private $logo;
		private $fav;
		
		private function __construct()
		{
			$conn = idb_helper::get_inst()->open_db();
			if($conn != null){
				$stmt = $conn->prepare("select * from general where gid = 1");
				$result = idb_helper::get_inst()->execute($stmt);
				$gen = $result->fetch_assoc();
				$this->description = $gen["des"];
				$this->image = $gen["image"];
				$this->keyword = $gen["tag"];
				$this->title = $gen["title"];
				$this->footer = $gen["footer"];
				$this->tag = $gen["tag"];
				$this->tel = $gen["phone"];
				$this->heading = $gen["heading"];
				$this->email = $gen["email"];
				$this->addr = $gen["addr"];
				$this->logo = $gen["logo"];
				$this->fav = $gen["fav"];
			}
		}
		
		public static function get_inst()
		{
			if(self::$general == NULL)
				self::$general = new self();
			
			return self::$general;
		}
		
		public function get_title()
		{
			return $this->title;
		}
		
		public function set_title($title)
		{
			$this->title = $title;
		}
		
		public function get_description()
		{
			return $this->description;
		}
		
		public function set_description($description)
		{
			$this->description = $description;
		}
		
		public function get_keyword()
		{
			return $this->keyword;
		}
		
		public function set_keyword($keyword)
		{
			$this->keyword = $keyword;
		}
		
		public function get_image()
		{
			return $this->image;
		}
		
		public function set_image($image)
		{
			$this->image = utility::get_base_url().$image;
		}
		
		public function get_tel()
		{
			return $this->tel;
		}
		
		public function set_tel($tel)
		{
			$this->icon = $tel;
		}
		
		public function get_footer()
		{
			return $this->footer;
		}
		
		public function set_footer($footer)
		{
			$this->footer = $footer;
		}
		
		public function get_tag()
		{
			return $this->tag;
		}
		
		public function set_tag($tag)
		{
			$this->footer = $tag;
		}
		
		public function get_heading()
		{
			return $this->heading;
		}
		
		public function set_heading($heading)
		{
			$this->heading = $heading;
		}
		
		public function get_email()
		{
			return $this->email;
		}
		
		public function set_email($email)
		{
			$this->email = $email;
		}
		
		public function get_addr(){
			return $this->addr;
		}
		
		public function set_addr($addr){
			$this->addr = $addr;
		}
		
		public function get_logo(){
			return $this->logo;
		}
		
		public function set_logo($logo){
			$this->logo = $logo;
		}
		
		public function get_fav(){
			return $this->fav;
		}
		
		public function set_fav($fav){
			$this->fav = $fav;
		}
	}
?>