<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<title>Image Upload</title>
	</head>
	<body>
		<?php
			// Required: anonymous function reference number as explained above.
			$funcNum = $_GET['CKEditorFuncNum'] ;
			// Optional: instance name (might be used to load a specific configuration file or anything else).
			$CKEditor = $_GET['CKEditor'] ;
			// Optional: might be used to provide localized messages.
			$langCode = $_GET['langCode'] ;
			// Optional: compare it with the value of `ckCsrfToken` sent in a cookie to protect your server side uploader against CSRF.
			// Available since CKEditor 4.5.6.
			$token = $_POST['ckCsrfToken'] ;
			
			if(isset($_FILES['upload']['name'])){
				$arr_type = array('image/gif', 'image/jpeg', 'image/png', 'image/x-png', 'image/pjpeg', 'image/bmp');
				if(in_array($_FILES['upload']['type'], $arr_type)){
					$save_name = '../../../gallery/'.str_replace(' ', '-', $_FILES['upload']['name']);
					if(move_uploaded_file($_FILES['upload']['tmp_name'], $save_name)){
						$url=str_replace('../../../', '', $save_name);
						echo "<script type='text/javascript'>window.parent.CKEDITOR.tools.callFunction($funcNum, '$url');</script>";
					}else{
						$message = 'Upload error, please try again!';
						echo "<script type='text/javascript'>window.parent.CKEDITOR.tools.callFunction($funcNum, '', '$message');</script>";
					}
				}else{
					$message = 'File format not accepted, please choice an image file!';
					echo "<script type='text/javascript'>window.parent.CKEDITOR.tools.callFunction($funcNum, '', '$message');</script>";
				}
			}else{
				$message = 'Bad request!';
				echo "<script type='text/javascript'>window.parent.CKEDITOR.tools.callFunction($funcNum, '', '$message');</script>";
			}			
		?>
	</body>
</html>