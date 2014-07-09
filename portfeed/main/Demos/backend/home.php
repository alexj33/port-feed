




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

<script type="text/jQuery">
	
	jQuery(function ($) {
// Load dialog on page load
//$('#basic-modal-content').modal();

// Load dialog on click
$(document).on('click','#example-item 
	',function (e) {
    $('#example-item')
    .text($(this).data('mydata'))
    .modal();

    return false;
 });
});
</script>

 <canvas style="position:fixed; left:0%; width: 2000px; height:100%;" id="canvas"></canvas>
 <div  style="position:fixed; left:50%; top:55%; z-index:9999; height:600px; width:600px; margin: -300px 0 0 -300px;  ">
<p class="nosel" style="color: height:600px; width:1000px; color:#000; font-family: futura; font-size: 150px;">
port feed
</p>
 </div>

	<div style="display:none;" class="header">
    <div style="display:none;" class="window"></div>
	  <div style="display:none;" class="simple-modal-title"></div>
	</div>
	<div class="wrapper">
		<ul>
			<li style="display:none;" class="example-item" id="alert">
				<img src="assets/images/example-1.jpg" width="196" height="147" alt="Example 1">
				<a href="javascript;">Alert</a>
			</li>
			<li style="display:none;" class="example-item" id="confirm">
				<img src="assets/images/example-2.jpg" width="196" height="147" alt="Example 2">
				<a href="#">Confirm</a>
			</li>
			<li class="example-item" id="modal">
				<img  width="250" height="100" a>
				<p style="  font-family: futura; font-weight: 100; font-size: 25px; width:200px; height:30px; margin: -15px 0 0 -100px;  left:67%; top:31%; position:relative; " href="#">Get started</p>
			</li>
			<li style="display:none;" class="example-item" id="modal-ajax">
				<img src="assets/images/example-4.jpg" width="196" height="147" alt="Example 4">
				<a href="#">Modal Ajax</a>
			</li>
			<li style="display:none;" class="example-item" id="modal-image">
				<img  width="250" height="100" alt="Example 3">
				<a href="#">Modal Image</a>
			</li>
			<li style="display:none;" class="example-item" id="alert-noheader">
				<img src="assets/images/example-6.jpg" width="196" height="147" alt="Example 6">
				<a href="#">No header</a>
			</li>
			<li style="display:none;" class="example-item" id="modal-nofooter">
				<img src="assets/images/example-7.jpg" width="196" height="147" alt="Example 7">
				<a href="#">Video embed</a>
			</li>
			<li style="display:none;" class="example-item" id="example-eheh">
				<img style="display:none;" src="assets/images/example-8.jpg" width="196" height="147" alt="?">
				<a href="#">?</a>
			</li>  
			
		</ul>
		<div style="display:none;" class="clear"></div>
		
		
		
		<div style="display:none;" class="clear"></div>
		
		<ul style="display:none;">
			<li class="example-item">
				<a title="Picture 1" rel="simplemodal[examples]" href="assets/images/big/pic-1.jpg">
					<img src="assets/images/pic-1.jpg" width="196" height="147" alt="Creative Commons by Juan Lago" />
				</a>
			</li>
			<li class="example-item">
				<a title="Picture 2" rel="simplemodal[examples]" href="assets/images/big/pic-2.jpg">
					<img src="assets/images/pic-2.jpg" width="196" height="147" alt="Creative Commons by Juan Lago" />
				</a>
			</li>
			<li class="example-item">
				<a title="Picture 3" rel="simplemodal[examples]" href="assets/images/big/pic-3.jpg">
					<img src="assets/images/pic-3.jpg" width="196" height="147" alt="Creative Commons by Juan Lago" />
				</a>
			</li>
			<li class="example-item">
				<a title="Picture 4 (Standalone picture)" rel="simplemodal[other-examples]" href="assets/images/big/pic-4.jpg">
					<img src="assets/images/pic-4.jpg" width="196" height="147" alt="Creative Commons by Juan Lago" />
				</a>
			</li>
		</ul>		
		<div class="clear"></div>
		
		
	</div>
	<div class="clear"></div>

	<div style="top:8%; left:88%; font-family: futura; position:fixed; font-size: 25px; text-align:center; z-index:9999;  " >
	<a href="login.php">Login</a>
</div>

<div style="top:14%; left:88%; font-family: futura; position:fixed; font-size: 20px; text-align:center; z-index:9999; color: #fff;  " >
	<a style="color:#ccc;" href="signup.php" >signup</a>
</div>


<div id="hideaway"  style="width:100%; height:100%; background: rgba(0,0,0,0.95); position: fixed; z-index: 99999; display: none;">
 


	<div style="position:absolute; z-index:99999; " class="container">
            <!-- Codrops top bar -->
             
             <div style="top:10%; left:89%; font-family: futura; position:fixed; font-size: 60px;  " >

 <a style="color:white;" href="javascript:;" onClick="document.getElementById('hideaway').style.display='none';">x</a>

 </div>

            
            <section>				
                <div id="container_demo" >
                    <!-- hidden anchor to stop jump http://www.css3create.com/Astuce-Empecher-le-scroll-avec-l-utilisation-de-target#wrap4  -->
                    <a class="hiddenanchor" id="toregister"></a>
                    <a class="hiddenanchor" id="tologin"></a>
                    <div id="wrapper">
                        <div style="width: 600px; margin: -217.5 -300 ; position:fixed; top: 50%; left: 45%;" 
                        id="login" class="animate form">
                         
                    <form style="width:600px;" action="welcome.html" autocomplete="on" method="post"> 
                                
                                <p> 
                                    
                                    <input  style=" line-height:80px; font-size:60px; font-family: futura; color:#ededed;" id="username" name="username" required="required" type="text" placeholder="username"/>
                                </p>
                                <p> 
                                    
                                    <input style=" line-height:80px; font-size:60px; font-family: futura; color:#ededed;" id="password" name="password" required="required" type="password" placeholder="password"  /> 

                                </p>

                                <input style="color: white; font-family: futura; cursor: pointer;" type="submit" value="Enter" name="login" id="login-submit" />
                                
                               
                               
                            </form>





                        </div>

                        
						
                    </div>
                </div>  
            </section>
        </div>
        </div>

<div id="hideaways"  style="width:100%; height:100%; background: rgba(0,0,0,0.95); position: fixed; z-index: 99999; display: none;">
 


	<div style="position:absolute; z-index:99999; " class="container">
            <!-- Codrops top bar -->
             
             <div style="top:10%; left:89%; font-family: futura; position:fixed; font-size: 60px;  " >

 <a style="color:white;" href="javascript:;" onClick="document.getElementById('hideaways').style.display='none';">x</a>

 </div>

            
            <section>				
                <div id="container_demo" >
                    <!-- hidden anchor to stop jump http://www.css3create.com/Astuce-Empecher-le-scroll-avec-l-utilisation-de-target#wrap4  -->
                    <a class="hiddenanchor" id="toregister"></a>
                    <a class="hiddenanchor" id="tologin"></a>
                    <div id="wrapper">
                        <div style="width:  600px; margin: -217.5 -300 ; position:fixed; top: 45%; left: 45%;" 
                        id="login" class="animate form">
                         
                    
<form id="register" style="width:600px; " action="register.php" autocomplete="on" method="post" accept-charset="UTF-8"> 
                                
                                <p> 
                                    
                                    <input  style=" line-height:40px; font-size:40px; font-family: futura; color:#ededed; height:60px;" id="username" name="name" required="required" type="text" placeholder="user name"/>
                                </p>
                                <p> 
                                    
                                    <input style=" line-height:40px; font-size:40px; font-family: futura; height:60px; color:#ededed;" id="password" name="email" required="required" type="email" placeholder="email"  /> 

                                </p>

                                <p> 
                                    
                                    <input style=" line-height:40px; font-size:40px; font-family: futura; height:60px; color:#ededed;" id="password" name="email" required="required" type="email" placeholder="repeat email"  /> 

                                </p>

                                 <p> 
                                    
                                    <input style=" line-height:40px; font-size:40px; font-family: futura; height:60px; color:#ededed;" id="password" name="password" required="required" type="password" placeholder="password"  /> 

                                </p>

                                <p> 
                                    
                                    <input style=" line-height:40px; font-size:40px; font-family: futura; height:60px; color:#ededed;" id="password" name="password" required="required" type="password" placeholder="repeat password"  /> 

                                </p>

                                

                                <input style="color: white; font-family: futura; cursor: pointer;" type="submit" value="Enter" name="login" id="login-submit" />
                                
                               
                               
                            </form>




                        </div>

                        
						
                    </div>
                </div>  
            </section>
        </div>
        </div>

</body>
