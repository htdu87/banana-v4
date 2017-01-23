<?php
	class settings_model{
		
		function __construct(){
		}
		
		public function get_general(){
			$conn = idb_helper::get_inst()->open_db();
			if($conn != null){
				$stmt = $conn->prepare("call get_general");
				$result = idb_helper::get_inst()->execute($stmt);
				$gen = $result->fetch_assoc();
				return $gen;
			}
			return null;
		}
		
		public function update_general($title, $des, $tag, $heading, $footer, $phone, $email,$addr, $image, $logo, $fav){
			$conn = idb_helper::get_inst()->open_db();
			if($conn != null){
				$stmt = $conn->prepare("call update_general(?,?,?,?,?,?,?,?,?,?,?)");
				$stmt->bind_param("sssssssssss", $title,$des,$tag,$heading,$footer,$phone,$email,$addr,$image,$logo,$fav);
				$result = idb_helper::get_inst()->execute($stmt);
				if($result != null){
					$gen = $result->fetch_row();
					return $gen[0];
				}
			}
			return null;
		}
		
		function save_config($template,$timezone, $date_format, $time_format,$auth_email, $auth_pass, $row_per_page, $debug){
			$sec = new security();
			$con = file_get_contents('../core/config.con', FILE_USE_INCLUDE_PATH);
			$jcon = json_decode($con, true);
			$jcon['config'][0]['auth_email'] = $auth_email;
			$jcon['config'][0]['auth_password'] = empty($auth_pass)?"":$sec->encryption($auth_pass);
			//$jcon['config'][0]['thousands_separator'] = $thousand_separator;
			//$jcon['config'][0]['decimal_separator'] = $decimal_separator;
			//$jcon['config'][0]['decimal_num'] = $decimal_num;
			$jcon['config'][0]['row_per_page'] = $row_per_page;
			$jcon['config'][0]['date_format'] = $date_format;
			$jcon['config'][0]['time_format'] = $time_format;
			$jcon['config'][0]['debug'] = $debug == 'on' ? 'on' : 'off';
			$jcon['config'][0]['timezone'] = $timezone;
			$jcon['config'][0]['template'] = $template;
			$rs = file_put_contents('../core/config.con', json_encode($jcon), FILE_USE_INCLUDE_PATH);
			
			// release current instance
			config::get_inst()->release();
			
			// set new timezone
			date_default_timezone_set(config::get_inst()->get_timezone());
			return $rs;
		}
		
		function timezone(){
			$tzlist = DateTimeZone::listIdentifiers(DateTimeZone::ALL);
			$last_zone = "";
			$ctz = config::get_inst()->get_timezone();
			$html = "";
			foreach($tzlist as $tz)
			{	
				if($tz == $ctz)
					$selected = "selected";
				else
					$selected = "";
					
				if($tz != "UTC")
				{
					$sz = explode("/", $tz);
					if($sz[0] != $last_zone)
					{
						$last_zone = $sz[0];
						if(empty($last_zone))
							$html .= '<optgroup label="'.$last_zone.'">';
						else
							$html .= '</optgroup><optgroup label="'.$last_zone.'">';
					}
					$html .= '<option value="'.$tz.'" '.$selected.'>'.(sizeof($sz)==3?implode("/",array($sz[1],$sz[2])):$sz[1]).'</option>';
				}
			}
			$html .= '</optgroup>';
			$html .= '<optgroup label="UTC"><option value="UTC" '.$selected.'>UTC</option></optgroup>';
			
			return $html;
		}
		
		function date_format(){
			$dfs = array('d/m/Y', 'm/d/Y', 'Y/m/d', 'F j, Y');
			$cdf = config::get_inst()->get_date_format();
			$html = "";
			foreach($dfs as $df)
			{
				if($df == $cdf)
					$html .= '<option value="'.$df.'" selected>'.date($df).'</option>';
				else		
					$html .= '<option value="'.$df.'">'.date($df).'</option>';
			}
			
			return $html;
		}
		
		function time_format(){
			$tfs = array('g:i:s a','g:i a', 'g:i:s A','g:i A', 'H:i:s', 'H:i');
			$ctf = config::get_inst()->get_time_format();
			$html = "";
			foreach($tfs as $tf)
			{
				if($tf == $ctf)
					$html .= '<option value="'.$tf.'" selected>'.date($tf).'</option>';
				else		
					$html .= '<option value="'.$tf.'">'.date($tf).'</option>';
			}
			
			return $html;
		}
		
		function template(){
			$html = '';
			$dirs = array_filter(glob('../template/*'), 'is_dir');
			$ctemplate = config::get_inst()->get_template();
			foreach($dirs as $dir)
			{
				$val = str_replace("../","",$dir)."/template.tpl";
				$name = str_replace("../template/","",$dir);
				if($ctemplate == $val)
					$selected = "selected";
				else
					$selected = "";
				$html .= '<option value="'.$val.'" '.$selected.'>'.$name.'</option>';
			}
			return $html;
		}
		
		function item_per_page(){
			$items = array(10,50,100,1000,-1);
			$citem = config::get_inst()->get_row_per_page();
			$html = "";
			foreach($items as $item){
				
				if($item == $citem)
					$html .= '<option value="'.$item.'" selected>'.($item==-1?"All items (Not recommended)":$item." Items").'</option>';
				else		
					$html .= '<option value="'.$item.'">'.($item==-1?"All items (Not recommended)":$item." Items").'</option>';
			}
			
			return $html;
		}
	}
?>