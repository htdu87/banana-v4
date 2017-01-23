<?php
	class settings_view{
		private $ctrl;
		
		function __construct($ctrl, $model){
			$this->ctrl = $ctrl;
		}
		
		public function output(){
			return $this->ctrl->get_html();
		}
	}
?>