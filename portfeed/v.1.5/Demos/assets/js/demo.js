$(document).ready(function() {		
		//$('#left-panel').addClass('animated bounceInRight');
		$('#project-progress').css('width', '50%');
		$('#msgs-badge').addClass('animated bounceIn');	
		
		$('#my-task-list').popover({
			html:true			
		})
});

$(document).ready(function() {
    
    //Show Banner
    $(".main_image .desc").show(); //Show Banner
    $(".main_image .block").animate({ opacity: 0.85 }, 1 ); //Set Opacity
 
   
    //Toggle Teaser
    $("a.collapse").click(function(){
        $(this).next().slideToggle();
        $(this).toggleClass("show");
    });




});//Close Function  

    $(document).ready(function() {
        $('#showmenu').click(function() {
                $('.menu').slideToggle("fast");
        });
    });