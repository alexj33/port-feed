<?php include_once('classes/login.class.php'); ?>
</head>
<link rel="stylesheet" href="assets/css/reset.css" type="text/css" media="screen" title="no title" charset="utf-8">
    <link rel="stylesheet" href="assets/css/demo.css" type="text/css" media="screen" title="no title" charset="utf-8">
    
    <script src="assets/javascript/mootools-core-1.3.1.js" type="text/javascript" charset="utf-8"></script>
    <script src="assets/javascript/mootools-more-1.3.1.1.js" type="text/javascript" charset="utf-8"></script>
    <script src="../Source/simple-modal.js" type="text/javascript" charset="utf-8"></script>
    <script src="assets/javascript/demo.js" type="text/javascript" charset="utf-8"></script>
	  <link rel="shortcut icon" type="image/png" href="http://simplemodal.plasm.it/apple-touch-icon.png" />
	  <link rel="shortcut icon" href="../favicon.ico"> 
        <link rel="stylesheet" type="text/css" href="css/demo.css" />
        <link rel="stylesheet" type="text/css" href="css/style.css" />
		<link rel="stylesheet" type="text/css" href="css/animate-custom.css" />

</head>
<body style="background-color:white;">
	
<div style="display:none" id="forgot-form" class="modal hide fade">
	<div style="border:0px; display:none" class="modal-header">
		<a class="close" data-dismiss="modal">&times;</a>
		<h3><?php _e('Forgot your Password?'); ?></h3>
	</div>
	<div style=" border:0px; display: none" class="modal-body">
		<div id="message"></div>
		<form style="width:600px;" action="forgot.php" method="post" name="forgotform" id="forgotform" class="form-stacked forgotform normal-label">
			<div class="controlgroup forgotcenter">
			<label for="usernamemail"><?php _e('Username or Email Address'); ?></label>
				<div class="control">
					<input style="  line-height:80px; font-size:60px; font-family: futura; color:#000000;" placeholder="username" id="usernamemail" name="usernamemail" type="text"/>
				</div>
			</div>
			<input type="submit" class="hidden" name="forgotten">
		</form>
	</div>
	<div class="modal-footer">
		<button data-complete-text="<?php _e('Done'); ?>" class="btn btn-primary pull-right" id="forgotsubmit"><?php _e('Submit'); ?></button>
		<p class="pull-left"><?php _e('It\'ll be easy, I promise.'); ?></p>
	</div>
</div>

 <canvas style="position:fixed; left:0%; top:50%; width: 2000px; height:50%;" id="canvas"></canvas>

<div border:0px; class="row">
	<div style=" border: 0px; width: 600px; margin: -217.5 -300 ; position:fixed; top: 50%; left: 50%;" class="main login">
		<form style="border:0px;" style="width:600px;" method="post" autocomplete="on" class="form normal-label" action="login.php">
		<fieldset style="border:0px; outline:none; width: 600px; " >
		<h4><?php _e(''); ?></h4>
			<div style="position: fixed; margin: -0 -300px; height: 90px; top: 30%; left: 50%; width: 600px; border:0px;" class="control-group">
			<label for="username" class="login-label"><?php echo $login->use_emails ? _('Email address') : _(''); ?></label>
				<div style="  width:600px; border:0px;" class="controls">
					<input autofocus="true" required="required" placeholder="username" style="   outline: none; width:100%; background-color:transparent; text-align: center; box-shadow: inset 0 0px 0px; border: 0px; height:80px; line-height:80px; font-size:60px; font-family: futura; color:#000000;"  id="username" name="username" type="text"/>
					
				</div>
			</div>
		</br>

			<div style="height: 90px; position: fixed; margin: -0 -300px ; top: 40%; left: 50%; width: 600px; border: 0px;" class="control-group">
			<label for="password" class="login-label"><?php _e(''); ?></label>
				<div style=" width: 600px;  border: 0px;" class="controls">
					<input required="required" placeholder="password" style="  width: 600px; outline: none; text-align: center; background-color:transparent; border: 0px; box-shadow: inset 0 0px 0px; line-height:80px; height:80px; font-size:60px; font-family: futura; color:#000000;"  id="password" name="password" size="30" type="password"/>
				</div>
			</div>
		</fieldset>

<div style="position: fixed; top: 60%; left: 40%; ">
		<input type="hidden" name="token" value="<?php echo $_SESSION['jigowatt']['token']; ?>"/>
		<input style="background: transparent; border: 0px; " type="submit" value="<?php _e(''); ?>" class="btn login-submit" id="login-submit" name="login"/>

		<label class="remember" for="remember">
			<input style="width:30px; height:30px; " type="checkbox" id="remember" name="remember"/><span style=" margin-top: 30px; color:#ededed; font-family: futura; font-size: 30px;" ><?php _e('Stay signed in'); ?></span>
		</label>
</div>
<div style="position: fixed; top: 5%; left: 85%;">
		<p style="text-decoration: none; color: #000000; font-family: futura; font-size: 25px; " class="signup"><a style="color:#000000; " href="sign_up.php"><?php _e('Sign Up'); ?></a></p>

		<?php if ( !empty($jigowatt_integration->enabledMethods) ) : ?>
	</div>

		<div style=" border: 0px;" class="">
			<?php foreach ($jigowatt_integration->enabledMethods as $key ) : ?>
				<p><a href="login.php?login=<?php echo $key; ?>"><img src="assets/img/<?php echo $key; ?>_signin.png" alt="<?php echo $key; ?>"></a></p>
			<?php endforeach; ?>
		</div>

		<?php endif; ?>

		</form>
	</div>

</div>
</body>
