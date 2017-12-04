<?php
	
    spl_autoload_register(function($class){
		$fname = $class.'.php';
		if(file_exists('core/'.$fname)){
			include_once('core/'.$fname);
		}
	});

    set_error_handler(function($errno, $errstr, $errfile, $errline ){
		error_handler::get_inst()->add_error("Error message: ".$errstr);
		error_handler::get_inst()->add_error("File: ".$errfile);
		error_handler::get_inst()->add_error("Line number: ".$errline);
	});
	
	date_default_timezone_set(config::get_inst()->get_timezone());
	
	$m = isset($_GET["m"]) && !empty($_GET["m"]) ? $_GET["m"] : "home";
	$ROUTER = new router();
    $CONTENT = $ROUTER->load_module($m,true);
    

    $TITLE = general::get_instance()->get_title();
    $DESCRIPTION = general::get_instance()->get_description();
    $KEYWORD = general::get_instance()->get_keyword();
    $FOOTER = general::get_instance()->get_footer();
    $TAG = general::get_instance()->get_tag();
    $TEL = general::get_instance()->get_tel();
    $HEADING = general::get_instance()->get_heading();
    $BASE = utility::get_base_url();
    $PATH = str_replace('template.tpl','', config::get_instance()->get_template());

    include_once($PATH.'template.tpl');

?>