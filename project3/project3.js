var background =[];
background [0]= "url('1.jpg')";
background [1]= "url('2.jpg')";
background [2]= "url('3.jpg')";
background [3]= "url('4.jpg')";

    var arr=[];
    var row;
    var col;
    var total = parseInt(row)*parseInt(col);
    var size;
    var posx =[];
    var posy =[];
    var myTimer;
    var minutes =0;
    var seconds =0;
    var index;
function check(elt){
        var c= elt.id;
        var v = elt.innerHTML;
        var down=parseInt(c)+10;
        var up=parseInt(c)-10;
        var left=parseInt(c)-1;
        var right=parseInt(c)+1;
        var pos=parseInt(v);
        var x =posx[pos-1];
        var y =posy[pos-1];
    var tpos =15;
    var temp;
    var y1;
    var x1;
    var t;
        if(document.getElementById(down) !=null){//down
            temp= document.getElementById(down).innerHTML;
            if(temp==""){
                 y1= posy[tpos];
                x1= posx[tpos];
                t=document.getElementById(down);
                elt.style.backgroundPositionX=(x1+"px");
                elt.style.backgroundPositionY=(y1+"px");
                t.style.backgroundPositionX=(x+"px");
                t.style.backgroundPositionY=(y+"px");
                document.getElementById(down).innerHTML = elt.innerHTML;
                elt.innerHTML = "";
            }
        }
        if(document.getElementById(up) !=null){//up
            temp= document.getElementById(up).innerHTML;
            if(temp==""){
                y1= posy[tpos];
                x1= posx[tpos];
                t=document.getElementById(up);
                elt.style.backgroundPositionX=(x1+"px");
                elt.style.backgroundPositionY=(y1+"px");
                t.style.backgroundPositionX=(x+"px");
                t.style.backgroundPositionY=(y+"px");
                document.getElementById(up).innerHTML = elt.innerHTML;
                elt.innerHTML = "";
            }
        }
        if(document.getElementById(left) !=null){//left
             temp= document.getElementById(left).innerHTML;
            if(temp ==""){
                y1= posy[tpos];
                x1= posx[tpos];
                t=document.getElementById(left);
                elt.style.backgroundPositionX=(x1+"px");
                elt.style.backgroundPositionY=(y1+"px");
                t.style.backgroundPositionX=(x+"px");
                t.style.backgroundPositionY=(y+"px");
                document.getElementById(left).innerHTML = elt.innerHTML;
                elt.innerHTML = "";
            }
        }
        if(document.getElementById(right) !=null){//left
             temp= document.getElementById(right).innerHTML;
            if(temp ==""){
                y1= posy[tpos];
                x1= posx[tpos];
                t=document.getElementById(right);
                elt.style.backgroundPositionX=(x1+"px");
                elt.style.backgroundPositionY=(y1+"px");
                t.style.backgroundPositionX=(x+"px");
                t.style.backgroundPositionY=(y+"px");
                document.getElementById(right).innerHTML = elt.innerHTML;
                elt.innerHTML = "";
            }
        }
        var n=complete();
        if(n==(row*col)){
            alert("Congrulation, You won!!");
            gameEnd();
        }
    }
function complete(){
    var ch=0;
    for(var i=0; i<(row);i++){
        for(var j=0; j<col; j++){
            var id1=(i+1)*10+j;
            var c =document.getElementById(id1).innerHTML;
            var d=i*row+j+1;
            if(c==d || c==""){
                ch++;
        }
        else{
            ch=ch;
        }
        }
    }
    return ch;
}
function random(){
        arr1=arr;
        shuffleArray(arr1);
           div(row,col,size);
          clock();
    }
function shuffleArray(array) {
    for (var i = array.length - 1; i > 0; i--) {
        var pos = Math.floor(Math.random() * i);
      var tmp = arr1[i-1];
      arr1[i-1] = arr1[pos];
      arr1[pos] = tmp;
    }
}

function changeBackground(c){
    document.getElementById("game").innerHTML="";
    start(row,col,size,c);
}
function start(r,c ,s,rand){
    gameon=true;
    size =s;
    index =rand;
    row =r;
    col =c;
    posx=[];
    posy=[];
      for(var i=0; i<(r*c);i++){
           if(i!=(r*c-1)){
               arr[i]=i+1;
           }else{
                arr[i]="";
           }
      }
        for(var i=0; i<r;i++){
            var tr= document.createElement("tr");
             document.getElementById("game").appendChild(tr);
                for(var j=0; j<c;j++){
                    var x=100*j; var y=100*i;
                    var id1=(i+1)*10+j;
                    posx.push(-x);
                    posy.push(-y);
                    var td= document.createElement("td");
                    td.id=id1;
                    td.style.backgroundImage =background[index];
                    td.style.backgroundPositionX=(-x+"px");
                    td.style.backgroundPositionY=(-y+"px");
                    td.style.backgroundSize = s;
                    td.setAttribute("onmouseover", "mouseIn(this)");
                    td.setAttribute("onmouseout", "mouseOut(this)");
                    td.setAttribute("onclick", "check(this)");
                    td.innerHTML = arr[i*r+j];
                    document.getElementById("game").append(td);       
        }
        }
    }
function mouseOut(elt){
    elt.style.borderColor = "black";
    elt.style.color= "red";
}
    function mouseIn(elt){
        var c= elt.id;
        var v = elt.innerHTML;
        var down=parseInt(c)+10;
        var up=parseInt(c)-10;
        var left=parseInt(c)-1;
        var right=parseInt(c)+1;
        if(document.getElementById(down) !=null){//down
            var temp= document.getElementById(down).innerHTML;
            if(temp ==""){
                elt.style.borderColor = "red";
                elt.style.color= "magenta";
            }
        }
        if(document.getElementById(up) !=null){//up
            var temp= document.getElementById(up).innerHTML;
            if(temp ==""){
                 elt.style.borderColor = "red";
                elt.style.color= "magenta";
            }
        }
        if(document.getElementById(left) !=null){//left
            var temp= document.getElementById(left).innerHTML;
            if(temp ==""){
                elt.style.borderColor = "red";
                elt.style.color= "magenta";
            }
        }
        if(document.getElementById(right) !=null){//left
            var temp= document.getElementById(right).innerHTML;
            if(temp ==""){
                elt.style.borderColor = "red";
                elt.style.color= "magenta";
            }
        }
    }
function div(r,c ,size){   
        for(var i=0; i<r;i++){
                for(var j=0; j<c;j++){
                     var id1=(i+1)*10+j;
                    var td =document.getElementById(id1);
                    var index =arr1[i*r+j];
                    td.innerHTML = index;
                    var x =posx[index-1];
                    var y =posy[index-1];
                    td.style.backgroundPositionX =x+"px";
                    td.style.backgroundPositionY =y+"px";   
        }
        }
}
    
function gameEnd(){
    clearInterval(myTimer);
      document.getElementById("game").innerHTML="Congrulation, You have solve the puzzle.  The total time you use to solve is "+minutes+" minutes and "+seconds+" seconds.  The best move is xx minutes and xx seconds.  To restart game, select level of difficulies and submit." ;
}
function level() {
    var radios = document.getElementsByName("level");
    var found = 1;
    for (var i = 0; i < radios.length; i++) {       
        if (radios[i].checked) {
                 var game = document.getElementById("game");
                game.innerHTML="";
                row=Math.sqrt(radios[i].value);
                col=Math.sqrt(radios[i].value);
                size=""+row*100+"px"+ " "+col*100+"px";
                game.style.width=""+row*100+"px";
                game.style.height=""+col*100+"px";
                start(row,col,size, index);
            found = 0;
            break;
        }
    }
    if(found == 1)
    {
        alert("Please Select level before change difficulities.");
    }    
}
window.onload = function(e){ 
    var rand = Math.floor(Math.random() * 4) ; 
  start(4,4,"400px 400px",rand);
     
}

   function clock() {
        clearInterval(myTimer);
     myTimer = setInterval(myClock, 1000);
       var c=0;
     function myClock() {
         seconds =Math.floor(c%60);
         if(c>=60){
             minutes =Math.floor(c/60);
             seconds=Math.floor(c%60);
         }
         c++;
         document.getElementById("time").innerHTML = "Time:  "+minutes +":" +seconds;

     }
   }