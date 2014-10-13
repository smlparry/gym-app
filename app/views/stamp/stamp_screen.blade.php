
<!DOCTYPE html>
<html>
    <head>
        <title>Stamp Screen</title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    </head>
    <body style="min-height: 480px; background-color: #27ae60;">
       <canvas id="canvas" style="-webkit-user-select: none; -webkit-user-drag: none; -webkit-tap-highlight-color: rgba(0, 0, 0, 0); touch-action: none; width: 1440px; height: 805px; background-image: url(images/stamp.gif); background-color: rgb(255, 255, 255);" width="1440" height="805"></canvas>
    </body>
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>

    <script type="text/javascript" src="js/touchy.js"></script>
    <script type="text/javascript" src="js/sss.client.js"></script>
<script type="text/javascript" src="js/sss.util.js"></script>
<script type="text/javascript" src="js/jquery.json-2.4.min.js"></script>
<script>
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
