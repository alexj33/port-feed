<?php include_once('classes/signup.class.php'); ?>
<head>
    <meta charset="utf-8" />
    <title>Port Feed</title>
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
	<canvas style="position:fixed; left:0%; top:50%; width: 2000px; height:50%;" id="canvas"></canvas>
<div class="row">
	<div class="span6">
		<form autocomplete="on" style=" border: 0px; width: 600px; margin: -217.5 -300 ; position:fixed; top: 50%; left: 50%;" class="form-horizontal" method="post" action="sign_up.php" id="sign-up-form">
			<fieldset style="border:0px; outline:none; width: 600px; ">
				<div class="control-group">
					
					<div class="controls">
						<input autofocus="true" required="required" style=" outline: none; width:100%; background-color:transparent; text-align: center; border: 0px; line-height:80px; font-size:50px;  height:80px;font-family: futura; color:#000000;" type="text"  id="name" name="name" value="<?php echo $signUp->getPost('name'); ?>" placeholder="<?php _e('full name'); ?>">
					</div>
				</div>

				<?php if (empty($signUp->use_emails)) : ?>

				<div tyle="width: 600px; border:0px;" class="control-group" id="usrCheck">
					
					<div tyle="width: 600px; border:0px;" class="controls">
						<input required="required" style=" outline: none; width:100%; background-color:transparent; text-align: center; border: 0px; line-height:80px; font-size:50px; font-family: futura;  height:80px;color:#000000;" type="text"  id="username" name="username" maxlength="15" value="<?php echo $signUp->getPost('username'); ?>" placeholder="<?php _e('username'); ?>">
					</div>
				</div>
				<?php endif; ?>

				<div tyle="width: 600px; border:0px;" class="control-group">
					
					<div tyle="width: 600px; border:0px;" class="controls">
						<input required="required" style=" outline: none; width:100%; background-color:transparent; text-align: center; border: 0px; line-height:80px; font-size:50px; font-family: futura; height:80px; color:#000000;" type="email"  id="email" name="email" value="<?php echo $signUp->getPost('email'); ?>" placeholder="<?php _e('email'); ?>">
					</div>
				</div>

				<div tyle="width: 600px; border:0px;" class="control-group">
					
					<div tyle="width: 600px; border:0px;" class="controls">
						<input required="required" style=" outline: none; width:100%; background-color:transparent; text-align: center; border: 0px; line-height:80px; font-size:50px; font-family: futura; height:80px; color:#000000;" type="password"  id="password" name="password" placeholder="<?php _e('password'); ?>">
					</div>
				</div>
				<div tyle="width: 600px; border:0px;" class="control-group">
					
					<div tyle="width: 600px; border:0px;" class="controls">
						<input required="required" style=" outline: none; width:100%; background-color:transparent; text-align: center; border: 0px; line-height:80px; font-size:50px; font-family: futura; height:80px; color:#000000;" type="password"  id="password_confirm" name="password_confirm" placeholder="<?php _e('repeat password'); ?>">
					</div>
				</div>

				<div class="control-group">
					<?php $signUp->profileSignUpFields(); ?>
				</div>

				<div class="control-group">
					<?php $signUp->doCaptcha(true); ?>
				</div>

			</fieldset>
			<input type="hidden" name="token" value="<?php echo $_SESSION['jigowatt']['token']; ?>"/>
			<button style="background-color: transparent; border: 0px; " type="submit" class="btn btn-primary"><?php _e(''); ?></button>
		</form>
	</div>
	<div style="position: fixed; top: 5%; left: 85%;">
		<p style="text-decoration: none;  color: #000000; font-family: futura; font-size: 25px; " class="signup"><a style="color:#000000; " href="login.php"><?php _e('Login'); ?></a></p>

	</div>
</body>
	