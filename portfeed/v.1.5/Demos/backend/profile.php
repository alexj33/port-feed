<?php include_once('classes/profile.class.php');?>
<?php include_once('header.php');?>


<br>

<head>
    	<title>Port Feed</title>
    	<script type="text/javascript" language="javascript" src="lytebox.js"></script>
    	<link rel="stylesheet" href="lytebox.css" type="text/css" media="screen" />
        
       
    </head>
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

    <body>

    	  <div class="menu" class="nosel" style=" z-index: 999999; width:150px; height:100%; position:fixed; left:0%; top: 0%; background:black;   ">

<div class="uinfo" style=" display: none; position:fixed; z-index: 1;">

<p style="postition: fixed; width;30px; height:10px; left: 50%; font-size: 20px; ">
 
</p>
</div>
<a href="profile.php">
<div class="avatar" style=" ">
<img src="images/avatar.svg" width="70" height="70" style="position: absolute; top: 25px; margin: 38 38; left:27%; z-index: 999999; "   />
<p style="position:relative; top:33%; font-family:futura; font-size: 35px; left: 10%; ">
   <?php echo $_SESSION['jigowatt']['username']; ?>



       

</div>
</a>
<a href="feed.php">
<div  class="icon">


<img src="images/feed.svg" width="70" height="70" style="position: absolute; top: 150px; margin: 38 38; left:27%; " href="feed.html" />

</div>
</a>

<a href="myprojects.php">
<div class="icon">
<img src="images/projects.svg" width="70" height="70" style="position: absolute; top: 280px; margin: 38 38; left:27%; "  />
</div>
</a>

<a href="logout.php">
<div>
<img href="logout.php" src="images/off.svg" width="30" height="30" style="position: absolute; top: 90%; margin: 38 38; left:40%; "  />

</div>
</a>







           
            </div>

<div class="tabs-left">

	<ul class="nav nav-tabs">

		<?php if ( !$profile->guest ) : ?>
			<li class="active"><a href="#usr-control" data-toggle="tab"><i class="icon-cog"></i> <?php _e('General'); ?></a></li>
		<?php endif; ?>

		<?php $profile->generateProfileTabs($profile->guest); ?>
		<?php if (!$profile->guest && !$profile->denyAccessLogs()) : ?>
		<li><a href="#usr-access-logs" data-toggle="tab"><i class="icon-list-alt"></i> <?php _e('Access logs'); ?></a></li>
		<?php endif; ?>

		<?php if ( !$profile->guest && !empty( $jigowatt_integration->enabledMethods ) ) : ?>
		<li><a href="#usr-integration" data-toggle="tab"><i class="icon-random"></i> <?php _e('Integration'); ?></a></li>
		<?php endif; ?>

	</ul>
	


	<form class="form-horizontal" method="post" action="profile.php">
	<div class="tab-content">

		<?php if ( !$profile->guest ) : ?>
		<div class="tab-pane fade in active" id="usr-control">
			<fieldset>
				<legend><?php _e('General'); ?></legend>
				<div class="control-group">
					<label class="control-label" for="CurrentPass"><?php _e('Current password'); ?></label>
					<div class="controls">
						<input type="password" autocomplete="off" class="input-xlarge" id="CurrentPass" name="CurrentPass">
					</div>
				</div>
				<div class="control-group">
					<label class="control-label" for="name"><?php _e('Name'); ?></label>
					<div class="controls">
						<input type="text" class="input-xlarge" id="name" name="name" value="<?php echo $profile->getField('name'); ?>">
					</div>
				</div>
				<div class="control-group">
					<label class="control-label" for="email"><?php _e('Email'); ?></label>
					<div class="controls">
						<input type="email" class="input-xlarge" id="email" name="email" value="<?php echo $profile->getField('email'); ?>">
					</div>
				</div>
				<div class="control-group">
					<label class="control-label" for="password"><?php _e('New password'); ?></label>
					<div class="controls">
						<input type="password" autocomplete="off" class="input-xlarge" id="password" name="password" placeholder="<?php _e('Leave blank for no change'); ?>">
					</div>
				</div>
				<div class="control-group">
					<label class="control-label" for="confirm"><?php _e('New password again'); ?></label>
					<div class="controls">
						<input type="password" autocomplete="off" class="input-xlarge" id="confirm" name="confirm">
					</div>
				</div>

				<?php if ( $profile->getOption('profile-public-enable') ) : ?>
				<div class="control-group">
					<label class="control-label" for="confirm"><?php _e('Your public link'); ?></label>
					<div class="controls">
						<span class="uneditable-input"><?php echo SITE_PATH . 'profile.php?uid=' . $profile->getField('user_id'); ?></span>
					</div>
				</div>
				<?php endif; ?>

			</fieldset>
		</div>
		<?php endif; ?>

		<?php $profile->generateProfilePanels($profile->guest); ?>

		<?php if (!$profile->guest && !$profile->denyAccessLogs()) : ?>
		<div class="tab-pane fade" id="usr-access-logs">
			<fieldset>
				<legend><?php _e('Access Logs'); ?></legend>
				<?php $profile->generateAccessLogs(); ?>
			</fieldset>
		</div>
		<?php endif; ?>

		<?php if ( !$profile->guest && !empty( $jigowatt_integration->enabledMethods ) ) : ?>
		<div class="tab-pane fade" id="usr-integration">
			<fieldset>
				<legend><?php _e('Integration'); ?></legend><br>

				<p><?php _e('Use your preferred social method to login the next time you visit our site.'); ?></p><br>

				<?php

					foreach ($jigowatt_integration->enabledMethods as $key ) :
						$inUse = $jigowatt_integration->isUsed($key);
						?><div class="span3">
							<a class="a-tooltip" href="#" data-rel="tooltip" tabindex="99" title="<?php echo ucwords($key); ?>">
								<img src="assets/img/<?php echo $key; ?>.png" alt="<?php echo $key; ?>">
							</a>
							<a href="<?php echo $inUse ? '#' : '?link='.$key; ?>" class="btn btn-small btn-info<?php echo $inUse ? ' disabled' : ''; ?>"><?php _e('Link'); ?></a>
							<a href="<?php echo !$inUse ? '#' : '?unlink='.$key; ?>" class="btn btn-small<?php echo !$inUse ? ' disabled' : ''; ?>"><?php _e('Unlink'); ?></a>
							</div><?php

					endforeach;

				?>

			</fieldset>
		</div>
		<?php endif; ?>

		<?php if ( !$profile->guest ) : ?>
		<div class="form-actions">
			<button type="submit" class="btn btn-primary"><?php _e('Save changes'); ?></button>
		</div>
		<?php endif; ?>

	</div>
	</form>

<a href="uploadFile.php" class="lytebox" data-lyte-options="width:600 height:340" data-title="Image Upload">Upload Image</a><br /><br />

		<!-- Once our image upload completes, the below link will be shown and the "href" attribute updated with the path to the image //-->
		<a href="" class="lytebox" style="display: none;" id="uploadedFile" />Click Here to View</a>

</div>

</body>

<?php include ('footer.php'); ?>