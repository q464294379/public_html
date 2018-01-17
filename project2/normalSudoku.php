<?php
session_start();


?>
<?php
$_SESSION["start"] = microtime(true);

$correctSudoku = '834957261197826345256134978912683457475219683683745129529471836341568792768392514';
$arr = array();

for($row=0;$row<9;$row++) {
    for($col=0;$col<9;$col++) {
        $arr[$row][$col] = $correctSudoku[$row*9+$col];
    }
}
$r1 = rand(6,8);
$r2 = rand(6,8);
list($arr[$r1], $arr[$r2]) = array($arr[$r2], $arr[$r1]);
$r1 = rand(3,5);
$r2 = rand(3,5);
list($arr[$r1], $arr[$r2]) = array($arr[$r2], $arr[$r1]);
$r1 = rand(0,2);
$r2 = rand(0,2);
list($arr[$r1], $arr[$r2]) = array($arr[$r2], $arr[$r1]);

$r1 = rand(6,8);
$r2 = rand(6,8);
for($i=0;$i<9;$i++) {
    list($arr[$i][$r2], $arr[$i][$r1]) = array($arr[$i][$r1], $arr[$i][$r2]);
}
$r1 = rand(3,5);
$r2 = rand(3,5);
for($i=0;$i<9;$i++) {
    list($arr[$i][$r2], $arr[$i][$r1]) = array($arr[$i][$r1], $arr[$i][$r2]);
}
$r1 = rand(0,2);
$r2 = rand(0,2);
for($i=0;$i<9;$i++) {
    list($arr[$i][$r2], $arr[$i][$r1]) = array($arr[$i][$r1], $arr[$i][$r2]);
}

$randomArr = array();

for ($i=0;$i<=80;$i++) {
    $randomArr[] = $i;
}
shuffle($randomArr);
$soduku = array();
for($i=0;$i<9;$i++) {

    for($j=0;$j<9;$j++) {
            $soduku[$i][$j] = 0;
    }
}
$_SESSION["correctArr"] = $arr;
for ($i=0;$i<=25;$i++) {
    $row=$randomArr[$i]/9;
    $col=$randomArr[$i]%9;
    $soduku[$row][$col] = $arr[$row][$col];
}
$_SESSION["userInput"] = $soduku;
echo '<div>';
echo '<div id="left1">';
echo '</div>';
echo '<div id="center">';
echo '<form action="submit.php" method="get">';
echo '<br><table style="border-collapse:collapse">';
for($row=0;$row<9;$row++) {
    echo '<tr>';
    for($col=0;$col<9;$col++) {
		if($soduku[$row][$col] == 0 ){
			echo "<td > <input type=\"text\" name=\"array$row$col\" value=\"\" size=\"1\"> </td>";
		}
		else{	
			echo "<td class=\"userInputColor\">",$soduku[$row][$col],"</td>";
		}
	}
    echo '</tr>';
}
echo '</table>';
echo '<input type="submit" class="check" value="check it">';
echo '</form>';
echo '</div>';



echo '</div>';
?>