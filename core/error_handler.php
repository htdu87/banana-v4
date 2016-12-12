<?php
	class error_handler{
		private $msg;
		private static $inst;
		
		private function __construct(){
			$this->clear();
		}
		
		public static function get_inst(){
			if(self::$inst == null)
				self::$inst = new self();
			return self::$inst;
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