<?php
session_start();
?>
<html>
<head>
<link rel="stylesheet" type="text/css" href="style.css" />
</head>
<body>
<?php
function check(){
	for($row=0;$row<9;$row++) {
		for($col=0;$col<9;$col++) {
			if($_GET["array$row$col"] != null){
				if($_GET["array$row$col"] != $_SESSION["correctArr"][$row][$col]){	
				return false;
				}
			}
			if($row == 8){
				return true;
			}
		}
	}
}
    $time_end = microtime(true);
$time = $time_end - $_SESSION["start"] ;
$time = intval($time);
echo $time;
$hour = intval($time/3600);
$min = intval(($time - $hour*3600)/60);
$second = $time%60;
if(check() == true){
    echo '<p class="text">';
	echo "congradulations you have solve the puzzle";
    echo '</p>';
}
else if (check() == false){
    echo '<p class="text">';
	echo "sorry,you missed something, practice more.<br/>";
    echo "Time : $hour:$min:$second";
     echo '</p>';
}

//echo '<p class="text">';
//echo "Time : $hour:$min:$second";
//    echo '</p>';
    
echo '<div>';
echo '<div id="left">';
echo "<p class=\"h4\">Your answer</p>";
echo '<br><table style="border-collapse:collapse" >';
for($row=0;$row<9;$row++) {
    echo '<tr>';
    for($col=0;$col<9;$col++) {
		if($_SESSION["userInput"][$row][$col] == 0){

			echo '<td>',$_GET["array$row$col"],'</td>';
		}
		else{
			echo '<td class="userInputColor">',$_SESSION["correctArr"][$row][$col],'</td>';
		}
						
    }
    echo '</tr>';
}
echo '</table>'; 
 echo '</div>';
echo '<div id="center">';
echo "<p class=\"h4\">Correct answer</p>";
echo '<br><table style="border-collapse:collapse">';
for($row=0;$row<9;$row++) {
    echo '<tr>';
    for($col=0;$col<9;$col++) {
			echo '<td class="userInputColor" >',$_SESSION["correctArr"][$row][$col],'</td>';
    }
    echo '</tr>';
}
echo '</table>'; 
    echo '</div>';
    echo '</div>';
echo "<a href=\"start.html\" class=\"button\">Home</a>";
?>
</body>
</html>