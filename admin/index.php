<html>
	<header>
		<title>Test page</title>
		<script type="text/javascript" src="ckeditor-4.6.0/ckeditor.js"></script>
	</header>
	<body>
		<textarea name="editor" id="editor"></textarea>
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
	</script>
</html>