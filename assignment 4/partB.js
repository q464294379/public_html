

var r = Math.floor(Math.random() * 101);;
var move =7;
 


function start(){
   var music = document.getElementById("music");
   document.getElementById("game").style.visibility = "visible";
     document.getElementById("st").style.visibility = "hidden";
    music.loop = true;
    music.play();
     clock(20);
}
function restart(){
    var music = document.getElementById("music");
    clearInterval(myTimer);
    move =7;
   document.getElementById("game").style.visibility = "hidden";
     document.getElementById("st").style.visibility = "visible";
    document.getElementById("guess").innerHTML="Your remaining guess : 7";
    document.getElementById("result").innerHTML = "";
    document.getElementById("userInput").value = "";
    music.pause();
     clock(20);
    
}
function check(){
    var out ="";
        var i=0;
            var input = document.getElementById("userInput").value;
        if(move>0){
            do{
            move--;
            if (input.length === 0) {
                alert("Please enter a valid input");
                return;
            }
            else{
                if(input>r){
                    out=out+  input+" is too high" +"<br/>";
                    i=0;
                }
                if(input<r){
                    out= out+ input +" is too low"+ "<br/>";
                    i=0;
                }
                if(input==r){
                    out=out+input + " is correct"  +"<br/>";
                    i= -1;
                }
                }
            }while(i=0);
            document.getElementById("guess").innerHTML = "Your remaining guess: " + move;
            document.getElementById("result").innerHTML = out;
           
        }
    else{
//        document.getElementById("result").innerHTML = "You Lose.  The secret number is "+r ;
        alert("You Lose.  The secret number is "+r );

        restart();
    }
}

var myTimer;
   function clock(time) {
     myTimer = setInterval(myClock, 1000);
     var c = time;

     function myClock() {
       document.getElementById("seconds").innerHTML = --c+ "seconds";
       if (c == 0) {
         clearInterval(myTimer);
         alert("You Lose");
           restart();
       }
     }
   }




