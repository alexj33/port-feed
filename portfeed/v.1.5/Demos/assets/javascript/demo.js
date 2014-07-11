// shim layer with setTimeout fallback
window.requestAnimFrame = (function(){
  return  window.requestAnimationFrame       ||
          window.webkitRequestAnimationFrame ||
          window.mozRequestAnimationFrame    ||
          function( callback ){
            window.setTimeout(callback, 1000 / 60);
          };
})();



//<![CDATA[
window.onload=function(){
/**
 *    Wave oscillators by Ken Fyrstenberg Nilsen
 *    http://abdiassoftware.com/
 *
 *    CC-Attribute 3.0 License
*/
var ctx = canvas.getContext('2d'),
    w, h;

canvas.width = w = window.innerWidth * 1.1;
canvas.height = h = window.innerHeight * 1;

var osc1 = new osc(),
    osc2 = new osc(),
    osc3 = new osc(),
    horizon = h * 0.5;
    count = 40,
    step = Math.ceil(w / count),
    //points = new Array(count);
    buffer = new ArrayBuffer(count * 4),
    points = new Float32Array(buffer);

osc1.max = 5;//h * 0.7;

osc2.max = 5;
osc2.speed = 1;

osc2.max = 5;
osc2.speed = 2;

function fill() {
    for(var i = 0; i < count; i++) {
        points[i] = mixer(osc1, osc2, osc3);
    }
}
fill();

ctx.lineWidth = 20;
ctx.strokeStyle = '#9ce2e0';
ctx.fillStyle = '#9ce2e0';

function loop() {

    var i;

    /// move points to the left
    for(i = 0; i < count - 1; i++) {
        points[i] = points[i + 1];
    }

    /// get a new point
    points[count - 1] = mixer(osc1, osc2, osc3);

    ctx.clearRect(0, 0, w, h);
    //ctx.fillRect(0, 0, w, h);

    /// render wave
    ctx.beginPath();
    ctx.moveTo(-5, points[0]);

    for(i = 1; i < count; i++) {
        ctx.lineTo(i * step, points[i]);
    }

    ctx.lineTo(w, h);
    ctx.lineTo(-5, h);
    ctx.lineTo(-5, points[1]);

    ctx.stroke();
    ctx.fill();
}

/// oscillator object
function osc() {

    this.variation = 0.4;
    this.max = 150;
    this.speed = 0.01;

    var me = this,
        a = 0,
        max = getMax();

    this.getAmp = function() {

        a += this.speed;

        if (a >= 2.0) {
            a = 0;
            max = getMax();
        }

        return max * Math.sin(a * Math.PI);
    }

    function getMax() {
        return Math.random() * me.max * me.variation +
            me.max * (1 - me.variation);
    }

    return this;
}

function mixer() {

    var d = arguments.length,
        i = d,
        sum = 0;

    if (d < 1) return 0;

    while(i--) sum += arguments[i].getAmp();

    return sum / d + horizon;
}

(function animloop(){
  requestAnimFrame(animloop);
  loop();
})();

}//]]>

var _targetdiv = null;
function showdiv(id) {
    if(_targetdiv)
        _targetdiv.style.display = 'none';
    _targetdiv = document.getElementById(id);
    _targetdiv.style.display = 'block';
}
/*
* Mootools Simple Modal
* Version 1.0
* Copyright (c) 2011 Marco Dell'Anna - http://www.plasm.it
*/
window.addEvent("domready", function(e){
  /* Alert */
  $("alert").addEvent("click", function(e){
    e.stop();
    var SM = new SimpleModal({"btn_ok":"Alert button"});
        SM.show({
          "title":"Alert Modal Title",
          "contents":"Lorem ipsum dolor sit amet..."
        });
  })
  
  /* Confirm */
  $("confirm").addEvent("click", function(e){
    e.stop();
    var SM = new SimpleModal({"btn_ok":"Confirm button"});
        SM.show({
          "model":"confirm",
          "callback": function(){
            alert("Action confirm!");
          },
          "title":"Confirm Modal Title",
          "contents":"Lorem ipsum dolor sit amet..."
        });
  })
  
  /* Modal */
  $("modal").addEvent("click", function(e){
    e.stop();
    var SM = new SimpleModal({"btn_ok":"Confirm button"});
        // Aggiunge Bottone Conferma
        SM.addButton("Confirm", "btn primary", function(){
            alert("Action confirm modal");
            this.hide();
        });
        // Aggiunge Bottone annulla
        SM.addButton("", "");
        SM.show({
          "model":"modal",
          "title":"<p style='padding-left:60px; padding-top:30px;'>I want to find . . .</p>",
          "contents":"<div id='changesearch'><div class='nosel' id='bodytext'>creative work</div></div> <div id='changeneed'><div  id='bodytext' class='nosel' style='left:-145px;'>creative people</div>"
        });
  })

  $("input:text:visible:first").focus();
  
  /* Modal Ajax */
  $("modal-ajax").addEvent("click", function(e){
    e.stop();
    var SM = new SimpleModal({"btn_ok":"Confirm button", "width":600});
        // Aggiunge Bottone Conferma
        SM.addButton("Confirm", "btn primary", function(){
						// Check
						if( $("confirm-text").get("value") != "DELETE" ){
							$("confirm-delete-error").setStyle("display", "block");
						}else{
							// Your code ...
							this.hide();
						}
        });
        // Aggiunge Bottone annulla
        SM.addButton("Cancel", "btn");
        SM.show({
          "model":"modal-ajax",
          "title":"Are you sure you want to delete this?",
          "param":{
            "url":"ajax-content.html",
            "onRequestComplete": function(){ }
          }
        });
  })

  /* Modal Image */
  $("modal-image").addEvent("click", function(e){
    e.stop();
    var SM = new SimpleModal({
          "onAppend":function(){
            $("simple-modal").fade("hide").fade("in")
          }
        });
        SM.show({
          "model":"modal-ajax",
					"title":"Modal Lightbox",
          "param":{
            "url":"assets/images/lightbox.jpg",
            "onRequestComplete": function(){ }
          }
        });
  })

  /* NO Header */
  $("alert-noheader").addEvent("click", function(e){
    e.stop();
    var SM = new SimpleModal({"hideHeader":true, "closeButton":false, "btn_ok":"Close window", "width":600});
        SM.show({
          "model":"alert",
          "contents":"Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum."
        });
  })
  
  /* NO Footer */
  $("modal-nofooter").addEvent("click", function(e){
    e.stop();
    var SM = new SimpleModal({"hideFooter":true, "width":710});
        SM.show({
          "title":"Vimeo video",
          "model":"modal",
          "contents":'<iframe src="http://player.vimeo.com/video/26198635?title=0&amp;byline=0&amp;portrait=0&amp;color=824571" width="680" height="382" frameborder="0" webkitAllowFullScreen allowFullScreen></iframe>'
        });
  })
  
  $("example-eheh").addEvent("click", function(e){
    e.stop();
    var SM = new SimpleModal(
            {
              "btn_ok":"Confirm button",
              "overlayClick":false,
              "width":300,
              "onAppend":function(){
                $("simple-modal").fade("hide");
                setTimeout((function(){ $("simple-modal").fade("show")}), 200 );
                var tw = new Fx.Tween($("simple-modal"),{
                  duration: 1600,
                  transition: 'bounce:out',
                  link: 'cancel',
                  property: 'top'
                }).start(-400, 150)

                var item = $("simple-modal").getElement(".simple-modal-footer a");
                    item.removeClass("primary").setStyles({"background":"#824571","color": "#FFF" });
                    item.getParent().addClass("align-left");
	                  item.addEvent("mouseenter", function(){
	                    var parent = this.getParent();
	                    if( parent.hasClass("align-left") ){
	                      parent.removeClass("align-left").addClass("align-right");
	                    }else{
	                      parent.removeClass("align-right").addClass("align-left");
	                    }
	                  })
              }
            });
        // Aggiunge Bottone Conferma
        SM.addButton("Click ME please!", "btn primary", function(){});
        SM.show({
          "model":"modal",
          "title":"Eh eh eh",
          "contents":"<p>Try clicking on the button \"Click ME please!\"</p>"
        });
  });
});