
<!DOCTYPE html>
<html>
    <head>
        <title>Stamp Screen</title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <style type="text/css">
        .full-height { 
    width:100%;
    background-image: url('images/stamp_bg.jpg');
    background-size: cover;
    }</style>
    </head>
   <body style=" background-color: #ff755a;">

        
        <div class="full-height" id="background"></div>

    </body>
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>

    <script type="text/javascript" src="js/touchy.js"></script>
    <script type="text/javascript" src="js/sss.client.js"></script>
<script type="text/javascript" src="js/sss.util.js"></script>
<script type="text/javascript" src="js/jquery.json-2.4.min.js"></script>
<script>
// Set container min-height function
function resizeWindow(e) {
    // Get window height
    var windowHeight = $(window).height();
    // Check if window height is larger than your required minimum height
        // Set selector min-height to the window height
        $('.full-height').css('height', windowHeight);
}

// Set height on load
resizeWindow();

// Update height on window resize
$(window).bind('resize', resizeWindow);


var body = document.getElementsByTagName("body")[0];
var errorStart;
var errorTime = 0;
var insufficientCount = 0;
var touchDone = false;
var timeouts={};
var errorURL ="http://128.199.214.127/s/error";//set this to a URL you want to direct to for incompatible devices

var callbackURL = "http://128.199.214.127/s/callback";// set this to a URL that will host your callback data

function errorCheck(number){
  if(insufficientCount >2){
      window.location=errorURL;
  }
  timeouts[number] = setTimeout(function(){
          window.location=errorURL;
      }, 2000);
      
  
  errorStart = new Date();
      
 
  if (errorTime > 2000) {
     window.location=errorURL;    
  }
  
}
function endErrorCheck(number){
    errorTime += new Date() - errorStart;
    
    clearTimeout(timeouts[number]);
}
function incrementCount(){
    setTimeout(function(){
        touchDone = true;
    },20);
    if (touchDone == true){
        insufficientCount++;
        touchDone = false;
    }
}
Touchy(body, {
    one: function(hand, finger){
        hand.on('start', function(points){
            errorCheck(1);
            
        });
        hand.on('end', function(points){
           endErrorCheck(1);
        });
    },
    two: function(hand, finger1, finger2){
        hand.on('start', function(points){
            errorCheck(2);
            
        });
        hand.on('end', function(points){
           endErrorCheck(2);
        });
    },
    three: function(hand, finger1, finger2, finger3){
        hand.on('start', function(points){
           errorCheck(3);
            
        });
        hand.on('end', function(points){
          endErrorCheck(3);
        });
    },
    
    four: function(hand, finger1, finger2, finger3, finger4){
        hand.on('start', function(points){
            errorCheck(4);
            
        });
        hand.on('end', function(points){
           endErrorCheck(4);
        });
    },
    
    five: function (hand, finger1, finger2, finger3, finger4, finger5) {
        hand.on('start', function (points) {
            data=[];
            for(x in points){
                data[x] = [points[x]["x"], points[x]["y"]]; 
            }
            
            sss.client.init(callbackURL); 
            sss.client.call(data);
        });
    },
    
    any:function(hand, finger){
        finger.on('start', function(){
           incrementCount();  
        });
       
    }

});
</script>
</html>
