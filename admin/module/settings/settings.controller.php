<?php
	class settings_controller{
		private $html;
		private $model;
		
		function __construct($model){
			general::get_inst()->set_title("Settings");
			$this->model = $model;
		}
		
		private function gen_form_site(){
			$gen = $this->model->get_general();
			if($gen==null)return '';
			return '
			<div class="row">
				<div class="col-md-6">
					<h2 class="sub-header">Site</h2>
					<form method="post" action="?m=settings&act=save_site">
						<div class="form-group">
							<label for="txt-title">Site default title</label>
							<input type="text" class="form-control" id="txt-title" name="title" maxlength="95" value="'.htmlspecialchars($gen["title"]).'">
						</div>
						<div class="form-group">
							<label for="txt-des">Site description</label>
							<textarea class="form-control" id="txt-des" name="des" maxlength="245">'.$gen["des"].'</textarea>
						</div>
						<div class="form-group">
							<label for="txt-tag">Keywords</label>
							<textarea class="form-control" id="txt-tag" name="tag" maxlength="245">'.$gen["tag"].'</textarea>
						</div>
						<div class="form-group">
							<label for="txt-heading">Site default heading</label>
							<input type="text" class="form-control" id="txt-heading" name="heading" maxlength="95" value="'.htmlspecialchars($gen["heading"]).'">
						</div>
						<div class="form-group">
							<label for="txt-footer">Site footer</label>
							<input type="text" class="form-control" id="txt-footer" name="footer" maxlength="95" value="'.htmlspecialchars($gen["footer"]).'">
						</div>
						<div class="form-group">
							<label for="txt-phone">Support phone number</label>
							<input type="text" class="form-control" id="txt-phone" name="phone" maxlength="45" value="'.htmlspecialchars($gen["phone"]).'">
						</div>
						<div class="form-group">
							<label for="txt-email">Support email</label>
							<input type="email" class="form-control" id="txt-email" name="email" maxlength="95" value="'.htmlspecialchars($gen["email"]).'">
						</div>
						<div class="form-group">
							<label for="txt-addr">Address</label>
							<input type="text" class="form-control" id="txt-addr" name="addr" maxlength="95" value="'.htmlspecialchars($gen["addr"]).'">
						</div>
						<div class="form-group">
							<label for="txt-image">Default social image</label>
							<input type="text" class="form-control" id="txt-image" name="image" maxlength="95" value="'.htmlspecialchars($gen["image"]).'">
						</div>
						<div class="form-group">
							<label for="txt-logo">Logo</label>
							<input type="text" class="form-control" id="txt-logo" name="logo" maxlength="95" value="'.htmlspecialchars($gen["logo"]).'">
						</div>
						<div class="form-group">
							<label for="txt-fav">Favorite icon</label>
							<input type="text" class="form-control" id="txt-fav" name="fav" maxlength="95" value="'.htmlspecialchars($gen["fav"]).'">
						</div>
						<button type="submit" class="btn btn-primary">Save</button>
					</form>
				</div>
				<div class="col-md-6">
					<h2 class="sub-header">System</h2>
					<form method="post" action="?m=settings&act=save_system">
						<div class="form-group">
							<label for="cmb-template">Template</label>
							<select name="template" class="form-control" id="cmb-template">'.$this->model->template().'</select>
						</div>
						<div class="form-group">
							<label for="cmb-timezone">Time zone</label>
							<select name="timezone" class="form-control" id="cmb-timezone">'.$this->model->timezone().'</select>
						</div>
						<div class="form-group">
							<label for="cmb-date-format">Date format</label>
							<select name="dateformat" class="form-control" id="cmb-date-format">'.$this->model->date_format().'</select>
						</div>
						<div class="form-group">
							<label for="cmb-time-format">Time format</label>
							<select name="timeformat" class="form-control" id="cmb-time-format">'.$this->model->time_format().'</select>
						</div>
						<div class="form-group">
							<label for="txt-auth-email-addr">Authen email address</label>
							<input type="email" class="form-control" id="txt-auth-email-addr" name="authmailaddr" maxlength="95" value="'.htmlspecialchars(config::get_inst()->get_authen_email()).'">
						</div>
						<div class="form-group">
							<label for="txt-auth-email-addr">Authen email password</label>
							<input type="password" class="form-control" id="txt-auth-email-addr" name="authmailpass" maxlength="95" value="'.htmlspecialchars(config::get_inst()->get_authen_password()).'">
						</div>
						<div class="form-group">
							<label for="cmb-item-per-page">Item per page</label>
							<select name="itemperpage" class="form-control" id="cmb-item-per-page">'.$this->model->item_per_page().'</select>
						</div>
						<div class="checkbox">
							<label>
								<input type="checkbox" name="debug" '.(config::get_inst()->get_debug()=="on"?"checked":"").'> Debug mode
							</label>
						  </div>
						<button type="submit" class="btn btn-primary">Save</button>
					</form>
				</div>
			</div>
			
			';
		}
		
		public function save_site(){
			if ($_SERVER['REQUEST_METHOD'] == 'POST'){
				$title=$_POST["title"];
				$des=$_POST["des"];
				$tag=$_POST["tag"];
				$heading=$_POST["heading"];
				$footer=$_POST["footer"];
				$phone=$_POST["phone"];
				$email=$_POST["email"];
				$addr=$_POST["addr"];
				$image=$_POST["image"];
				$logo=$_POST["logo"];
				$fav=$_POST["fav"];
				$rst = $this->model->update_general($title,$des,$tag,$heading,$footer,$phone,$email,$addr,$image,$logo,$fav);
				
				if(is_null($rst)){
					notifycation::get_inst()->set_alert("Error","Save site settings error, please try later!");
				}else{
					if($rst>0){
						notifycation::get_inst()->set_toast("Save site settings successful!");
					}else{
						// nothing to update
					}
				}
			}
		}
		
		public function save_system(){
			if ($_SERVER['REQUEST_METHOD'] == 'POST'){
				$template = $_POST["template"];
				$timezone = $_POST["timezone"];
				$date_format = $_POST["dateformat"];
				$time_format = $_POST["timeformat"];
				$auth_email = $_POST["authmailaddr"];
				$auth_pass = $_POST["authmailpass"];
				$row_per_page = $_POST["itemperpage"];
				$debug = isset($_POST["debug"])?"on":"off";
				if($this->model->save_config($template,$timezone, $date_format, $time_format,$auth_email, $auth_pass, $row_per_page, $debug)===false){
					notifycation::get_inst()->set_alert("Error","Save system settings error, please try later!");
				}else{
					notifycation::get_inst()->set_toast("Save system settings successful!");
				}
			}
		}
		
		public function get_html(){
			return $this->gen_form_site();
		}
	}
?>