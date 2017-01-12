<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
		<title>Image Browser</title>

		<!-- Bootstrap -->
		<link href="../../bootstrap-3.3.7-dist/css/bootstrap.min.css" rel="stylesheet">

		<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
		<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
		<!--[if lt IE 9]>
		  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
		  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
		<![endif]-->
		<style type="text/css">
			.img-row {
				margin-top:15px;
			}
		</style>
	</head>
	<body>
		<div class="container">
			<div class="row img-row">
				<?php
					$img_list = glob("../../../gallery/*.{jpg,JPG,jpeg,JPEG,gif,GIF,png,PNG,bmp,BMP}", GLOB_BRACE);
					usort($img_list, create_function('$a, $b', 'return filemtime($b) - filemtime($a);'));
					foreach($img_list as $img){
						$alt=str_replace('../../../gallery/','',$img);
						$p=str_replace('../../../','',$img);
						echo '
						<div class="col-xs-6 col-sm-4 col-md-3 col-lg-2">
							<a href="#" class="thumbnail" url="'.$p.'">
								<img src="../../../thumbnail.php?p='.$p.'&w=180&h=180" alt="'.$alt.'" title="'.$alt.'">
							</a>
						</div>';
					}
				?>
			</div>
		</div>

		<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
		<!-- Include all compiled plugins (below), or include individual files as needed -->
		<script src="../../bootstrap-3.3.7-dist/js/bootstrap.min.js"></script>
		<script type="text/javascript">
			function getUrlParam(paramName) {
				var reParam = new RegExp( '(?:[\?&]|&)' + paramName + '=([^&]+)', 'i' );
				var match = window.location.search.match( reParam );
				return ( match && match.length > 1 ) ? match[1] : null;
			}
			
			$(document).ready(function(){
				$('.thumbnail').click(function(e){
					e.preventDefault();
					var funcNum = getUrlParam('CKEditorFuncNum');
					var fileUrl = $(this).attr('url');
					window.opener.CKEDITOR.tools.callFunction(funcNum, fileUrl);
					//window.opener.onaction(fileUrl);
					window.close();
				});
			});
		</script>
	</body>
</html>