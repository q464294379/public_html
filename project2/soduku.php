<?php
session_start();


?>
<?php
$_SESSION["start"] = microtime(true);
$tpl = '618923754974651832523847961732516498491738625865492317146289573389175246257364189';
$arr = array();
//把模板数据初始化为数独二维数组矩阵
//这里第一维是行，第二维是列
for($row=0;$row<9;$row++) {
    for($col=0;$col<9;$col++) {
        $arr[$row][$col] = $tpl[$row*9+$col];
    }
}
//第一组 行交换
$r1 = rand(0,2);
$r2 = rand(0,2);
list($arr[$r1], $arr[$r2]) = array($arr[$r2], $arr[$r1]);
//第二组 行交换
$r1 = rand(3,5);
$r2 = rand(3,5);
list($arr[$r1], $arr[$r2]) = array($arr[$r2], $arr[$r1]);
//第三组 行交换
$r1 = rand(6,8);
$r2 = rand(6,8);
list($arr[$r1], $arr[$r2]) = array($arr[$r2], $arr[$r1]);

//第一组 列交换
$r1 = rand(0,2);
$r2 = rand(0,2);
for($i=0;$i<9;$i++) {
    list($arr[$i][$r2], $arr[$i][$r1]) = array($arr[$i][$r1], $arr[$i][$r2]);
}
//第二组 列交换
$r1 = rand(3,5);
$r2 = rand(3,5);
for($i=0;$i<9;$i++) {
    list($arr[$i][$r2], $arr[$i][$r1]) = array($arr[$i][$r1], $arr[$i][$r2]);
}
//第三组 列交换
$r1 = rand(6,8);
$r2 = rand(6,8);
for($i=0;$i<9;$i++) {
    list($arr[$i][$r2], $arr[$i][$r1]) = array($arr[$i][$r1], $arr[$i][$r2]);
}

//九宫格式输出
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
			echo "<td> <input type=\"text\" name=\"array$row$col\" value=\"\" size=\"1\"> </td>";
		}
		else{	
			echo "<td >",$soduku[$row][$col],"</td>";
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