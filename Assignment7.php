<html>

   <head>
       <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
      <title>Add New Album</title>
   </head>
   <body>
       <button id="bt1"> Add new Album</button>
       <button id="bt2"> Add new artist</button>
       <button id="bt3"> Choose an Album to check the artist and song </button>
       
       <?php
         $servername = 'localhost';
            $username = 'zweng1';
            $password = 'zweng1';

            $conn = new mysqli($servername, $username, $password);
       $db = "USE zweng1";
       $dbUse = $conn->query($db);
       if(isset($_POST['addA'])) {
            if(! $conn ) {
               die('Could not connect: ' . mysql_error());
            }
            $name = $_POST['name'];
            $name = $name."A";
            $sql = "CREATE TABLE $name (Artist VARCHAR(30) NOT NULL, Song VARCHAR(30) NOT NULL)"; 
            if ($conn->query($sql) === TRUE) {
                echo ".$name. created successfully";
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
         }
        if(isset($_POST['addArtist'])){
           $aname = $_POST['album']."A"; 
            $artistname = $_POST['artistName'];
            $songname = $_POST['song'];
           $sql = "INSERT INTO $aname VALUES ('$artistname','$songname')";   
        } 
       if(isset($_POST['chooseA'])){
           $aname = $_POST['album']."A"; 
           $sql =  $sql = "SELECT * FROM $aname"; 
            $result = $conn->query($sql);
             echo "<br> Albulm: " .$aname."";
        if (mysqli_num_rows($result) > 0) {
                while($row = mysqli_fetch_assoc($result)) {
                    $col1 = $row["Artist"];
                    $col2 = $row["Song"];
                    $value = str_replace(" ","|",$col2);
                    echo "<br> Artist:".$col1." Song:".$col2. "";
                }
        }else{
            echo "<br>No artist and song";
        }   
            if(isset($_POST['chooseartist'])){
                echo $v;
            $songName =$_POST['songname'];
            $v = str_replace("|"," ",$songName);
                
        }
        
    }
      
?>
       <script>
           $(document).ready(function() {
            $("#form1").hide();
            $("#form2").hide();
               $("#form3").hide();
           });
           $( "#bt1" ).click(function() {
                $("#form1").show();
               $("#form2").hide();
               $("#form3").hide();
            });
           $( "#bt2" ).click(function() {
                $("#form1").hide();
               $("#form2").show();
                $("#form3").hide();
            });
           $( "#bt3" ).click(function() {
                $("#form1").hide();
                $("#form2").hide();
               $("#form3").show();
            });
           $( "#bt4" ).click(function() {
               $("#form3").show();
            });
       </script>
       
      <form id= "form1"  method = "post" action = "Assignment7.php">
          <Label>Name: </Label>
          <input name = "name" type = "text" id = "name"><br>
          <input name = "addA" type = "submit" id = "add"  value = "Add New Album">
      </form>
       
       <form id= "form2"  method = "post" action = "Assignment7.php">
        <select name="album">
        <?php
                $sql = "SHOW TABLES LIKE '%A'";   
                $result = $conn->query($sql);
                while($row = mysqli_fetch_assoc($result)) {
                    $table = substr($row["Tables_in_zweng1 (%A)"],0,-1);
                    echo "<option value=$table >" . $table . "</option>";
                }
        ?>
        </select><br>
      <label><b>Artist</b></label>
      <input type="text"  name="artistName" required>
      <label><b>Song name</b></label>
      <input type="text"  name="song" required>
      <input type="submit" value="Add" name="addArtist" /><br>
      </form>
       
        <form id= "form3"  method = "post" action = "Assignment7.php">
        <select name="album">
        <?php
                $sql = "SHOW TABLES LIKE '%A'";   
                $result = $conn->query($sql);
                while($row = mysqli_fetch_assoc($result)) {
                    $table = substr($row["Tables_in_zweng1 (%A)"],0,-1);
                    echo "<option value=$table >" . $table . "</option>";
                }
        ?>
        </select>
       <input type="submit" id="bt4" value="Choose this Album" name="chooseA" /><br>
       </form>
       
        <?php
            $conn->close();
       ?>       
    
        
   </body>
</html>