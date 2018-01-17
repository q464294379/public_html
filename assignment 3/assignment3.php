
<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="assignment3.css">
    <title>Assignment 3</title>
    </head>
    
    <body>
        
<style type="text/css">
    table {
    width: 300px;
    height: 300px;
    border: 1px solid black;
}
.red {
    height: 35px;
    width: 35px;
    padding: 1px;
    margin: 1px;
   background-color: red;
}
       
.black {
     height: 35px;
    width: 35px;
    padding: 1px;
    margin: 1px;
   background-color: black;
}
    </style>     
        
        
<?php
$row = 8;
$column =8;

echo "<table>";
for($i =0; $i<$row; $i++){

    echo"<tr>";
    for($j =0; $j<$column; $j++){
        
         $total=$i+$j; 
          if($total%2==0)  
          {  
            echo '<td class ="black"></td>';  
          }  
          else if($total%2==1)  
          {  
            echo '<td class ="red"></td>'; 
          }  
          
            
    }
        echo "</tr>";
}
echo "</table>";
?>
    
        </body>
    </html>