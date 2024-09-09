<?php
include_once("session.php");
?>
<?php
include_once("connection.php");
if(isset($_GET['id'])){

    $teamid = $_GET['id'];

    $sql ="SELECT * FROM teams WHERE id=:teamid";
    $stmt = $conn ->prepare($sql);
   $data= [':teamid' => $teamid];
    $stmt -> execute($data);
    $res = $stmt ->fetch(PDO::FETCH_OBJ);

  $playersql ="SELECT * FROM players WHERE teamid=:teamid";
  $playerstmt = $conn ->prepare($playersql);
  $playerstmt ->bindParam(":teamid",$teamid);
   $playerstmt -> execute();

 


}

?>

<!DOCTYPE html>
<html>
<head>
    <title>
       Create New Team  
    </title>
    <link rel="stylesheet" type="text/css" href="styles.css">
</head>
<header>
    <figure>
     <img src="images/user.png" alt="Logo" class="logo2" >
     </figure>
        <h4>Welcome <br>
             <?php echo $_SESSION['email']; ?></h4>
             <h2><em> Football System Manager</em></h2>

             <figure>    
        <img src="images/logo.png" alt="Logo" class="logo" >
             </figure>
        
        <a href="about.php">About us</a> 
        <a href="logout.php">log out</a> 
     
     </header>
 <div>
    <nav>
       <ul>
           <li><a href="dashboard.php">Dashboard</a></li> 
           <br>  
           <li><a href="createteam.php">Create Team</a></li>
           <br>
           <li><a href="edit.php">Edit Team Details</a></li>
           <br>
       </ul>
   </nav>
   </div>
 <main>
<body>    
    <FORM METHOD="POST" ACTION=""
        <DIV ALIGN="CENTER"><CENTER> 
        
  <label for="teamname">Team Name:</label>
  <input type="text" id="teamname" name="teamname" value="<?= $res ->Name;?>"readonly>
  <br>
  <br>
  <label for="coach">Level Skill:</label>
  <input type="text" id="skill" name="skill" value="<?= $res ->Skill;?>"readonly>
  <br>
  <br>
  <label for="day">Game Day:</label>
  <input type="text" id="day" name="day" value="<?= $res ->day;?>"readonly>
  <br>
  <br>
  <label for="players">Players:</label>
    <?php 
    foreach($playerstmt ->fetchAll() as $player){
        echo "<li>" . $player["name"]. "</li>";
    }
    ?>
         
       <table class="table" TABLE BORDER="1" WIDTH="500" CELLPADDING="2">
        <tr>
       <th> <label for="playername" class="label-border">Player Name</label></th>
       <td> <input type="text" id="playername" name="playername" required placeholder="Enter player name"></td>
        </tr>
       
        <tr>
        <td  colspan="2" align="center">
              <input type = "submit" name = "action" value ="Add" />
              
         </td> </tr>  
         
         

       </table>        

       <?php
         if (isset($_POST["action"])  ) {
            if(($_GET['num'])<9){
             $playername = $_POST["playername"];
        
            $sql1 = "INSERT INTO players (teamid, name) VALUES ($teamid,:name )";
            $stmtt = $conn->prepare($sql1);
            $stmtt->bindParam(":name", $playername );
            $stmtt->execute();
            
            header("Location: dashboard.php");
        }
        else{
            echo "<label> The team is full !</label>";

        }
        }
       

       ?>
</CENTER>
        </DIV>

        <?php
include_once("connection.php");

if(isset($_GET['id'])){

    $teamid = $_GET['id'];

    $sql ="SELECT * FROM teams WHERE id=:teamid";
    $stmt = $conn ->prepare($sql);
   $data= [':teamid' => $teamid];
    $stmt -> execute($data);
    $res = $stmt ->fetch(PDO::FETCH_OBJ);

    $email = $res->email;

    $logged_in_user = $_SESSION['email'];

    if ($email == $logged_in_user) {
        echo "<a href='edit.php?id=$teamid'>Edit</a>";
    }}?>

    </form>
</body>
</main>
<footer>
    <img src="images/logo.png" alt="Logo" class="logo1" >
    <p>email:football@info.com </p>
   <p> telephone:+97256789874</p>
    <a href="about.php">Contact Us</a> 

 </footer>
</html>
