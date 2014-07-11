<?php ob_start(); ?>
<?php if (!isset($_SESSION)) session_start(); ?>
<?php include_once('classes/profile.class.php');?>
<!DOCTYPE html>
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
<body>

<div class="nosel" style="height:90px; width:350px; text-align: center; white-space: nowrap; overflow: scroll;font-size: 60px; font-family: futura; color: black; position: fixed; left: 55%; top: 40%; margin: -45px -175px;  ">
    Hey <?php echo $_SESSION['jigowatt']['username']; ?>


</div>


    <div class="example-itemh" >
                
                <p style="font-family: futura; font-weight: 100; font-size: 25px; width:200px; height:30px; margin: -15px  -100px; left:52%; top:50%; position:relative;  " >Show me around</p>

            </div>

            <canvas style=" display:none; position:fixed; z-index:9999; left:0%; top:80%; width: 2000px; height: 200px;"  id="canvas"></canvas>

<div style=" display: block; width:100%; height:120px; position:fixed; left:0%; top: 0%; background:transparent;">







<div class="menu" class="nosel" style=" z-index: 999999; width:150px; height:100%; position:fixed; left:0%; top: 0%; background:black;   ">

<div class="uinfo" style=" display: none; position:fixed; z-index: 1;">

<p style="postition: fixed; width;30px; height:10px; left: 50%; font-size: 20px; ">
 
</p>
</div>
<a href="profile.php">
<div class="avatar" style=" ">
<img 
 src="images/avatar.jpg" width="70" height="70" style="clip: rect(10px, 190px, 190px, 10px); position: absolute; top: 25px; margin: 38 38; left:27%; z-index: 999999; "   />
<p style="position:relative; top:33%; font-family:futura; font-size: 35px; left: 53%; ">
   <?php echo $_SESSION['jigowatt']['username']; ?>



       

</div>
</a>
<a href="feed.php">
<div  class="icon">


<img src="images/feed.svg" width="70" height="70" style="position: absolute; top: 150px; margin: 38 38; left:27%; " href="feed.html" />

</div>
</a>
<div class="icon">
<a style="width: 100%; height: 130px; position:absolute; z-index: 999999;  " href="javascript:;" onClick="document.getElementById('hideaway').style.display='block'; "> </a>
<img src="images/search.svg" width="70" height="70" style="position: absolute; top: 280px; margin: 38 38; left:27%; "  />
</div>

<a href="myprojects.php">
<div class="icon">
<img src="images/projects.svg" width="70" height="70" style="position: absolute; top: 410px; margin: 38 38; left:27%; "  />
</div>
</a>

<a href="logout.php">
<div>
<img href="logout.php" src="images/off.svg" width="30" height="30" style="position: absolute; top: 90%; margin: 38 38; left:40%; "  />

</div>
</a>







           
            </div>

<div style="top:8%; left:88%; font-family: futura; position:fixed; font-size: 30px; text-align:center; z-index:999;  " >
    
</div>

<div id="hideaway"  style="width:100%; height:100%; background: rgba(0,0,0,0.95); position: fixed; z-index: 9999; display: none;">
 


    <div style="position:absolute; z-index:999; " class="container">
            <!-- Codrops top bar -->
             
             <div  style="padding: 0px; top:50px;  font-family: futura; position:fixed; font-size: 60px;  " >

 <a style="color:white; position: fixed; top; 10px; left: 94%; z-index: 9999; margin: 0 -30 " href="javascript:;" onClick="document.getElementById('hideaway').style.display='none'; ">x</a>

 <form autocomplete="on">
 <div style="font-family: futura; position: fixed; left: 23%; top: 50px; border: 0px; width: 50%; height: 100px; font-size: 50px; padding: 10px; line-height:50px;  background: transparent; color: white; padding: 50px; text-align:center; ">

 <input style="font-family: futura;   border: 0px; width: 100%; height: 100px; font-size: 50px; padding: 10px; line-height:50px;  background: transparent; color: white; padding: 50px; text-align:center; " type="search" placeholder="Search"/>

 <input type="submit" style="background: transparent; color: transparent; border: 0px; " />

 <dv>
 </form>

</div>

 </div>