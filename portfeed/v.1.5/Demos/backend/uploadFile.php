<?php

	/**
	 *  Author: Markus F. Hay
	 *    Date: 09/04/2010
	 * Website: http://lytebox.com
	 *
	 * The purpose of this script is to upload images to a server, displaying a thumbnail 
	 * preview as soon as the file has been uploaded.
	 *
	 * Note that this is a simplified script that does not take sessions/security into
	 * account. Ideally you probably want users to authenticate and have a session before
	 * uploading files, so you'll have to add that functionality in yourself (recommended).
	 *
	 * You also want to add functionality for storing file names in a database so that
	 * you can associate images to particular users and whatnot.
	 *
	 * Prerequisites: This script assumes the parent document (which launches Lytebox) has
	 * a hidden anchor tag:
	 *
	 *	<a href="" class="lytebox" title="My Uploaded Image" style="display: none;" id="uploadFilename" />
	 *
	 * Once the image is successfully uploaded this anchor tag will be displayed and
	 * launch a new Lytebox showing the newly uploaded image.
	 
	 * DEMO: http://lytebox.com/uploadFileDemo.htm
	 * HELP: http://lytebox.com/forums
	 */

	// Disable warnings and messages since we handle that ourselves.
	error_reporting(0);	
	
	
	// *************************** //
	//  C O N F I G U R A T I O N  //
	// *************************** //
	
		// Set the upload directory. By default it will be a directory named "uploads" that is relative to this script.
		// In other words, if this script is located at yourdomain.com/scripts/uploadFile.php, then the uploads directory
		// is expected to be at yourdomain.com/scripts/uploads/. Ensure that the uploads directory is writable by this script 
		// and publically readable since the thumbnail preview will need to display the uploaded file.
		$sUploadDirectory	= 'uploads/';
	
		// Set up the mime types and extensions of files that we'll allow.
		$aFileTypesAllowed	= array('image/jpeg', 'image/gif', 'image/png');
		$aExtensionsAllowed = array('gif', 'png', 'jpg', 'jpeg');
		
		// Note that this is JavaScript syntax which will be output in the <script> section so that we can validate the file
		// extension before form submission. Keeping this here so that we can define extensions in the same place.
		$aJSExtensions		= 'new Array("gif", "png", "jpg", "jpeg")';
		
		// If only IMAGES are being allowed, then set this to true so we can determine if the iamge itself is good (and not malformed).
		$bImagesOnly = true;
	
		// Set the maximum allowable file size in bytes (100Kb by default).
		$iMaxFileSize = 1024000000000000;
		
	// *********************************** //
	//  E N D   C O N F I G U R A T I O N  // 
	// *********************************** //
	
	
	// To keep things simple, this script will post to itself to upload images.
	if(isset($_REQUEST['upload']) && $_REQUEST['upload'] == 'true') {
		
		// Initialize variables used.
		$bSuccess	= true;
		$sErrorMsg	= 'Your image was successfully uploaded.';
		
		// Before we go any futher we'll want to validate that we are receiving an acceptable image type.
		if (array_search($_FILES['myFile']['type'], $aFileTypesAllowed) === false || 
			!in_array(end(explode('.', strtolower($_FILES['myFile']['name']))), $aExtensionsAllowed)) {
			
			$bSuccess	= false;
			$sErrorMsg 	= 'Invalid file format. Acceptable formats are: ' . implode(', ', $aFileTypesAllowed);
			
		// If we are only allowing image uploads, then determine if the image is valid (not malformed).
		} else if ($bImagesOnly && !(getimagesize($_FILES['myFile']['tmp_name']))) {
			
			$bSuccess	= false;
			$sErrorMsg 	= 'The image is invalid or corrupt. Please select another.';
			
		// Now ensure that we don't exceed our filesize limit (1Mb).
		} else if ($_FILES['myFile']['size'] > $iMaxFileSize) {
			
			$bSuccess	= false;
			$sErrorMsg	= 'The file size of your property photo must not exceed ' . ($iMaxFileSize / 1024) . 'Kb. Please try again.';
			
		// Otherwise we have an allowable image type so we continue.
		} else {
			
			// Now attempt to copy the uploaded file over to our network share.
			if (!@move_uploaded_file($_FILES['myFile']['tmp_name'], $sUploadDirectory . $_FILES['myFile']['name'])) {
				$bSuccess 	= false;
				$sErrorMsg	= 'An unexpected error occurred while saving your uploaded photo. Please try again.';
			}
			
		}
		
		// Finally, we'll output some JavaScript which calls a function in our parent (which is essentially the Lytebox viewer).
		print	'<html>' .
					'<head>' .
						'<script type="text/javascript">' .
							'parent.uploadResult(' . ($bSuccess ? 'true' : 'false') . ', \'' . $sErrorMsg . '\', \'' . $sUploadDirectory . $_FILES['myFile']['name'] . '\');' .
						'</script>' .
					'</head>' .
					'<body></body>' .
				'</html>';

		// There is no need to continue processing as we've written out the only HTML that we'll need, so kill the script.
		die();
		
	}
	
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

	<head>
		<title>Lytebox File Upload</title>
        
        <script type="text/javascript">
			if (top === self) {
				location.href = 'index.php?launch=true&page=upload';
			}
		</script>
		
		<style type="text/css">
			html, body { background: none; background-color: #ffffff; font-family: Verdana, Geneva, sans-serif; font-size: 10px; }
			label { display: block; font-size: 13px; font-weight: bold; line-height: 18px; margin-bottom: 5px; }
			#wrapper { margin: 1em; }
			#preview { border: 2px dotted #ccc; float: left; width: 200px; }
			#inputContainer { margin-left: 1em; float: left; width: 320px; }
			#uploadTarget { width:0;height:0;border:0px solid #fff; }
			#errorDetails, #successDetails { color: #000; padding: 7px; display: none; line-height: 1.2em; }
			#errorDetails { border: 1px solid #F0C000; margin-bottom: 1em; background-color: #FFFFCE; }
			#successDetails { border: 1px solid #009900; margin-bottom: 1em; background-color: #DDFFDD; }
			.clear { clear: both; }
		</style>
		
		<script type="text/javascript">
			<!-- Preload the "loading" image because my web host is slow as dirt //-->
			preLoadLoaderImage = new Image();
			preLoadLoaderImage.src = 'images/loading200.gif'; 
			
			<!-- The following functions are used for displaying error/success messages //-->
			function clearMessages() {
				setMessage('failed', false, '');
				setMessage('passed', false, '');
			}
			function setMessage(sWhich, bShow, sMessage) {
				var el = (sWhich == 'failed' ? document.getElementById('errorDetails') : document.getElementById('successDetails'));
				el.innerHTML		= (bShow ? sMessage : '');
				el.style.display	= (bShow ? 'block' : 'none');
			}
			
			<!-- This function is called when an image is successfully uploaded. It's responsible for setting up and showing the thumbnail preview //-->
			function uploadResult(bSuccess, sMsg, sImageUrl) {
				clearMessages();
				if (bSuccess) {
					setMessage('passed', true, sMsg);
					
					// Show the "loading..." image.
					document.getElementById('imagePreview').src = 'images/loading200.gif';
					
					// We'll store the path/image in a hidden form field. This is queried when the savePhoto() function is called.
					document.getElementById('uploadedFile').value = sImageUrl;
					
					// Create a new image object and assign an onload handler, which essentially replaces the "loading" image above
					// with the uploaded image once it's loaded in the web browser.
					myUploadedImage = new Image();
					myUploadedImage.src = sImageUrl;
					myUploadedImage.onload = function () { document.getElementById('imagePreview').src = myUploadedImage.src; }
				} else {
					setMessage('failed', true, sMsg);
				}
			}
			
			<!-- This function will write back to the page that launched Lytebox and enable an image link to preview the newly uploaded image //-->
			function savePhoto() {
				// First check that an image has actually been uploaded.
				if (document.getElementById('uploadedFile').value == '') {
					setMessage('failed', true, 'You must first upload an image before saving.<br /><br />Please click the "Upload Photo..." button to begin the process.');
					return false;
				}
				
				// Now update the "uploadedFile" anchor tag in the parent page, which is a Lytebox enabled link.
				parent.document.getElementById('uploadedFile').href = document.getElementById('uploadedFile').value;
				parent.document.getElementById('uploadedFile').style.display = 'block';
				
				// Close this instance of Lytebox.
				parent.$lb.end();
			}
			
			<!-- Quick JavaScript validation (using our PHP extension types defined above in the configuration) to ensure a valid extension is selected //-->
			function validateExtension(sImage) {
				clearMessages();
				var sExtension = /[^.]+$/.exec(sImage);
					sExtension = String(sExtension);
				var aExtensionsAllowed = <?php print $aJSExtensions; ?>;
				var bValid = false;
				for (i = 0; i < aExtensionsAllowed.length; i++) {
					if (sExtension.toLowerCase() == aExtensionsAllowed[i]) {
						bValid = true;
						break;
					}
				}
				if (!bValid) {
					setMessage('failed', true, 'Invalid file format. Acceptable formats are: <?php print implode(', ', $aFileTypesAllowed); ?>');
				} else {
					document.getElementById('uploadForm').submit();
				}
			}
		</script>
        
        <script type="text/javascript">
			var _gaq = _gaq || [];
			_gaq.push(['_setAccount', 'UA-12786015-3']);
			_gaq.push(['_trackPageview']);
			(function() {
				var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
				ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
				var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
			})();
		</script>
	</head>

	<body>
	
		<div id="wrapper">
        
			<div id="preview">
				<img width="200px" src="images/silhouette.png" id="imagePreview" />
			</div>
			
			<div id="inputContainer">
				Please upload the image that you would like to preview. Note that the following limitations apply to uploaded images:<br />
				
				<ul>
					<li>Images must be in JPG/JPEG, GIF, or PNG format</li>
					<li>Image file size must not exceed <?php print $iMaxFileSize / 1024; ?>Kb</li>
				</ul>
				
				Once you click on the "Save" button this popup will close and you will be taken back to
				the main page where you can click the "View Image" button to see the results.<br /><br /><br />
				
				<form action="uploadFile.php?upload=true" id="uploadForm" method="post" enctype="multipart/form-data" target="uploadTarget">
					<label>Upload Image</label>
					<input type="file" size="30" id="imageUpload" name="myFile" onchange="validateExtension(this.value);" />
					&nbsp;
					<input type="button" class="button" value="Save" onclick="savePhoto();" />
					<input type="hidden" name="uploadedFile" id="uploadedFile" value="" />
				</form>
				
				<br />
                <div id="errorDetails"></div>
				<div id="successDetails"></div>
				
				<iframe id="uploadTarget" name="uploadTarget" src="#"></iframe>
			</div>
            
			<div class="clear"></div>
            
		</div>
	
	</body>

</html>