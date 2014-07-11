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

<form autocomplete="on">
 

 <input style="font-family: futura;   border: 0px; width: 40%; height: 100px; font-size: 50px; padding: 10px; line-height:50px;  background: transparent; color: black; padding: 50px; text-align:center; top: 50px; left: 33%; position: fixed;  " type="search" placeholder="Filter Results"/>

 <input type="submit" style="background: transparent; color: transparent; border: 0px; " />

 
 </form>

<div style="display:none; font-family:futura; left:200px; top:50px; position:fixed;">
<form  id="form1" name="form1" method="post" action="<?php $_SERVER['PHP_SELF']?>">
        
      
        <select class="dropdown" style="border: 0px; font-family:futura;" name='employees'>
            <option value="">Creative Field</option>
            <option value="">Advertising</option>
            <option value="">Design</option>
            <option value="">Graphic Design</option>
            <option value="">Film</option>
            <option value="">Music</option>
            <option value="">Fashion</option>
            <option value="">Crafts</option>
            <option value="">Publishing</option>
           
        </select>
    </form> 
</div>

<div class="nosel" style=" display:none; align-text: center; white-space: nowrap; overflow: scroll;font-size: 45px; font-family: futura; color: black; position: fixed; left: 500px; top: 180px; margin: -136px -287.5px;  ">
    Mmmm... Look at all these tasty projects

</div>


<div style="width:100%;  margin-left: 200px; margin-top: 200px; ">
<div  style=" float: left; width:33%; padding:25px; max-width:350px; min-width:250px;" class="col-md-12 m-b-20">      
                        
                   <div   class="widget-item narrow-margin">
                  <div  class="controller overlay right"> <a href="javascript:;" class="reload"></a> <a href="javascript:;" class="remove"></a> </div>
                  <div  class="tiles green  overflow-hidden full-height" style="max-height:214px">
                    <div  class="overlayer bottom-right fullwidth">
                      <div class="overlayer-wrapper">
                        <div  class="tiles gradient-black p-l-20 p-r-20 p-b-20 p-t-20">
                          
                        </div>
                      </div>
                    </div>
                    <img src="assets/img/others/cover.jpg" alt="" > </div>

                  <div style="min-height:170px; max-height:170px;" class="tiles white ">
                 
                       
                    
                   

</div>
</div>

                
</div>






<canvas style=" display:none; position:fixed; z-index:9999; left:0%; top:80%; width: 2000px; height: 200px;"  id="canvas"></canvas>

<div class="menu" class="nosel" style=" z-index: 999999; width:150px; height:100%; position:fixed; left:0%; top: 0%; background:black;   ">

<div class="uinfo" style=" display: none; position:fixed; z-index: 1;">

<p style="postition: fixed; width;30px; height:10px; left: 50%; font-size: 20px; ">
 
</p>
</div>
<a href="profile.php">
<div class="avatar" style=" ">
<img src="images/avatar.svg" width="70" height="70" style="position: absolute; top: 25px; margin: 38 38; left:27%; z-index: 999999; "   />
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

<div id="hideaway"  style="width:100%; height:100%; background: rgba(0,0,0,0.95); position: fixed; z-index: 9999; display: none; top:0%;">
 


    <div style="position:absolute; z-index:999; " class="container">
            <!-- Codrops top bar -->
             
             <div  style="padding: 0px; top:50px;  font-family: futura; position:fixed; font-size: 60px;  " >

 <a style="color:white; position: fixed; top; 10px; left: 94%; z-index: 9999; margin: 0 -30 " href="javascript:;" onClick="document.getElementById('hideaway').style.display='none'; ">x</a>

 <form autocomplete="on">
 <div style="font-family: futura; position: fixed; left: 23%; top: 50px; border: 0px; width: 50%; height: 100px; font-size: 50px; padding: 10px; line-height:50px;  background: transparent; color: white; padding: 50px; text-align:center; ">

 <input style="font-family: futura;   border: 0px; width: 100%; height: 100px; font-size: 50px; padding: 10px; line-height:50px;  background: transparent; color: white; padding: 50px; text-align:center; " type="search" placeholder="Search"/>

 <input type="submit" style="background: transparent; color: transparent; border: 0px; " />

 <div>
 </form>

</div>

 </div>



</body>