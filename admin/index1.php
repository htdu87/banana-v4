<html>
	<header>
		<title>Test page</title>
		<script type="text/javascript" src="ckeditor-4.6.0/ckeditor.js"></script>
	</header>
	<body>
		<textarea name="editor" id="editor"></textarea>
		<a href="javascript:void(0)" id="browser" onclick="popupCenter('ckeditor-4.6.0/browser/browser.php','title',1100,540)">Browser</a>
	</body>
	<script type="text/javascript">
		CKEDITOR.replace( 'editor', {
			//filebrowserBrowseUrl: 'ckfinder/ckfinder.html',
			//filebrowserUploadUrl: 'ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files'
			//filebrowserWindowWidth: '1000',
			//filebrowserWindowHeight: '700',
			//filebrowserBrowseUrl: 'ckfinder/ckfinder.html',
			filebrowserImageBrowseUrl: 'ckeditor-4.6.0/browser/browser.php',
			//filebrowserFlashBrowseUrl: 'ckfinder/ckfinder.html?type=Flash',
			//filebrowserUploadUrl: 'ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files',
			filebrowserImageUploadUrl: 'ckeditor-4.6.0/upload/upload.php'
			//filebrowserFlashUploadUrl: 'ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash'
		});
		
		/* function popupCenter(url, title, w, h) {
			var left = (screen.width/2)-(w/2);
			var top = (screen.height/2)-(h/2);
			return window.open(url, title, 'toolbar=no, location=no, directories=no, status=no, menubar=no, scrollbars=no, resizable=no, copyhistory=no, width='+w+', height='+h+', top='+top+', left='+left);
		} */ 
		
		function onaction(url){
			alert(url);
		}
	</script>
</html>