<?php
	class error_handler{
		private $msg;
		private static $ins;
		
		private function __construct(){
			$this->clear();
		}
		
		public static function get_instance(){
			if(self::$ins == null)
				self::$ins = new self();
			return self::$ins;
		}
		
		public function add_error($error){
			$this->msg .= '<p><code>'.$error.'</code></p>';
		}
		
		public function get_error(){
			return $this->msg;
		}
		
		public function clear(){
			$this->msg = "";
		}
	}
?>