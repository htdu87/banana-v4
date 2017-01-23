<?php
	class notifycation{
		private $tst_msg;
		private $alt_msg;
		private static $inst;
		
		private function __construct(){
		}
		
		public static function get_inst(){
			if(self::$inst == null)
				self::$inst= new self();
			return self::$inst;
		}
		
		public function set_toast($msg){
			$this->tst_msg = $msg;
		}
		
		public function get_toast(){
			return empty($this->tst_msg)?'':'<div id="toast">'.$this->tst_msg.'</div>';
		}
		
		public function set_alert($title, $msg){
			$this->alt_msg = '
			<div class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" id="alert">
				<div class="modal-dialog modal-sm" role="document">
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
							<h4 class="modal-title">'.$title.'</h4>
						</div>
						<div class="modal-body">'.$msg.'</div>
					</div>
				</div>
			</div>';
		}
		
		public function get_alert(){
			return empty($this->alt_msg)?'':$this->alt_msg;
		}
	}
?>