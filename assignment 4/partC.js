var c;
var value = [];
var id = [];
var count = 0;
var i = 0, j = 0, temp = null;
var arr = [];

function newData(num){
    for ( i = 0; i <num; i++) {
        arr.push(i%(num/2));
    }
    shuffle(arr);
}
function startGame(num,time){
    var output = '';
    count=0;
    arr = [];
      newData(num);
    for(var i = 0; i < arr.length; i++){
		output += '<div id="tile_'+i+'" onclick="check(this,\''+arr[i]+'\')"></div>';
	}
	document.getElementById('game3').innerHTML = output;
    document.getElementById('game3').style.visibility="visible";
    document.getElementById('diffLevel').style.visibility="hidden";
    clock(time);
}


function check(location,val){
	if(location.innerHTML == "" && value.length < 2){
		location.style.background = '#FFF';
		location.innerHTML = val;
		if(value.length == 0){
			value.push(val);
			id.push(location.id);
		}
        else if(value.length == 1){
			value.push(val);
			id.push(location.id);
			if(value[0] == value[1]){
				count += 2;
				value = [];
            	id = [];
				
				if(count == arr.length){
					alert("Congrulation, You Win!");
                    clearInterval(myTimer);
                    document.getElementById("seconds").innerHTML = 0+ "seconds";
					document.getElementById('game3').innerHTML = "";
					 document.getElementById('diffLevel').style.visibility="visible";
                    document.getElementById('game3').style.visibility="hidden";
				}
			} else {
				function flip2Back(){
				    var location_1 = document.getElementById(id[0]);
				    var location_2 = document.getElementById(id[1]);
            	    location_1.innerHTML = "";
            	    location_2.innerHTML = "";

				    value = [];
            	    id = [];
				}
				setTimeout(flip2Back, 1000);
			}
		}
	}
}
function shuffle(array) {
  var currentIndex = array.length, temporaryValue, randomIndex ;

  while (0 !== currentIndex) {

    randomIndex = Math.floor(Math.random() * currentIndex);
    currentIndex -= 1;
    temporaryValue = array[currentIndex];
    array[currentIndex] = array[randomIndex];
    array[randomIndex] = temporaryValue;
  }
  return array;
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
           document.getElementById('game3').innerHTML = "";
					 document.getElementById('diffLevel').style.visibility="visible";
                    document.getElementById('game3').style.visibility="hidden";
       }
     }
   }

