<?php
	class router {
		private $css;
		private $js;
		
		function __construct(){
			$this->css="";
			$this->js="";
		}
		
		public function load_module($name, $is_main = false, $ctype = 'text/html;charset=utf-8'){
			if(file_exists("module/$name")) {
				$files = glob("module/$name/*.{php,PHP}", GLOB_BRACE);
				foreach ($files as $file){
					include_once($file);
				}
			}
			
			if(file_exists("module/$name/js") && $ctype == 'text/html;charset=utf-8'){
				$files = glob("module/$name/js/*.{js,JS}", GLOB_BRACE);
				foreach ($files as $file){
					$this->js .= "<script type=\"text/javascript\" src=\"$file\"></script>\r\n";
				}
			}
			
			if(file_exists("module/$name/css") && $ctype == 'text/html;charset=utf-8') {
				$files = glob("module/$name/css/*.{css,CSS}", GLOB_BRACE);
				foreach ($files as $file){
					$this->css .= "<link rel=\"stylesheet\" type=\"text/css\" href=\"$file\" />\r\n";
				}
			}
			
			$model = $name.'_model';
			$view = $name.'_view';
			$control = $name.'_controller';
			
			$m_model = new $model();
			$m_controller = new $control($m_model);
			$m_view = new $view($m_controller, $m_model);
			if($is_main && isset($_GET["act"]) && !empty($_GET["act"]) && method_exists($m_controller, $_GET["act"])){
				$m_controller->{$_GET["act"]}();
			}
			return $m_view->output();
		}
		
		public function load_css(){
			return $this->css;
		}
		
		public function load_js(){
			return $this->js;
		}
	}
?>