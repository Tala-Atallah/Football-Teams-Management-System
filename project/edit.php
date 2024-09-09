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

    if (isset($_POST["action"])) {

        $teamname = $_POST['teamname'];
        $skill = $_POST['skill'];
        $day = $_POST['day'];

         $upsql = "UPDATE teams SET Name='$teamname', Skill='$skill', day='$day' WHERE id=$teamid";
         $upstmt = $conn->prepare($upsql);
         $upstmt->execute();

}

if (isset($_POST["delete"])) {

     $delsql = "DELETE FROM teams WHERE id=$teamid" ;
     $delstmt = $conn->prepare($delsql);
     $delstmt->execute();
     header("Location: dashboard.php");
}
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>
       Edit Team  
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
       </ul>
   </nav>
   </div>
 <main>
<body>
   
        
    <FORM METHOD="POST" ACTION=""
        <DIV ALIGN="CENTER"><CENTER>  
            <h1>
                Edit Team Data
            </h1>          
       <table class="table" TABLE BORDER="1" WIDTH="500" CELLPADDING="2">
        <tr>
       <th> <label for="teamname" class="label-border">Team Name:</label></th>
       <td> <input type="text" id="teamname" value="<?= $res ->Name;?>"name="teamname"  placeholder="Enter team name"></td>
        </tr>
        <tr>
       <th> <label for="skill" class="label-border">Level Skill:</label></th>
       <td><input type="text" id="skill" value="<?= $res ->Skill;?>" name="skill" pattern="[1-5]" placeholder="Enter team skill from 1-5"></td> 
        </tr>
        <tr>
        <th><label for="day" class="label-border">Game Day :</label></th>
        <td><input type="text" id="day" value="<?= $res ->day;?>" name="day"  placeholder="enter the day of the game"></td>
        </tr>
        <tr>
        <td  colspan="2" ALIGN="center">
              <input type = "submit" name = "action" value ="Edit" />
         </td> </tr>  
         <tr>
        <td  colspan="2" ALIGN="center">
              <input type = "submit" name = "delete" value ="Delete" />
         </td> </tr> 

       </table>        
</CENTER>
        </DIV>
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