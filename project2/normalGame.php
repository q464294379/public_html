<?php 
session_start(); 
?>
<html>
    <head>
        <title>Sudoku</title>
        <link rel="stylesheet" type="text/css" href="style.css" />
    </head>
    <body>
		<h2>Let's Sudoku</h2>
        <div id="content">
		<?php
			require_once('normalSudoku.php');
		?>
        </div>
    </body>
</html>