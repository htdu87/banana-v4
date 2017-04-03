<?php
	spl_autoload_register(function($class){
		$fname = $class.'.php';
		if(file_exists('../core/'.$fname)){
			include_once('../core/'.$fname);
		}
	});
	
	set_error_handler(function($errno, $errstr, $errfile, $errline ){
		error_handler::get_inst()->add_error("Error message: ".$errstr);
		error_handler::get_inst()->add_error("File: ".$errfile);
		error_handler::get_inst()->add_error("Line number: ".$errline);
	});
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="fav.ico">

    <title>Login account | Banana&trade; Management</title>
    <!-- Bootstrap core CSS -->
    <link href="bootstrap-3.3.7-dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <link href="css/ie10-viewport-bug-workaround.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/signin.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>
	<?php echo notifycation::get_inst()->get_toast();echo notifycation::get_inst()->get_alert()?>
	<?php if(config::get_inst()->get_debug()=="on")echo error_handler::get_inst()->get_error();?>
	<?php
		/*
		$s= new security();
		echo $s->encryption("Dsco#2017").'<br>';
		echo $s->decryption("Dt/7gp1JSx6km+QfMwyCsZwCXXOAEzl+cu0GTfJddkc=");
		*/
	?>
    <div class="container">
		
      <form class="form-signin">
        <h2 class="form-signin-heading">Please sign in</h2>
        <label for="inputEmail" class="sr-only">Email address</label>
        <input type="text" id="inputEmail" class="form-control" placeholder="Username" required autofocus>
        <label for="inputPassword" class="sr-only">Password</label>
        <input type="password" id="inputPassword" class="form-control" placeholder="Password" required>
        <div class="checkbox">
          <label>
            <input type="checkbox" value="remember-me"> Remember me
          </label>
        </div>
        <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
      </form>

    </div> <!-- /container -->
	
	<footer class="footer">
      <div class="container">
        <p class="text-muted">Copyright &copy 2014-2017. Banana&trade; PHP Framework</p>
      </div>
    </footer>


    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="js/ie10-viewport-bug-workaround.js"></script>
  </body>
</html>