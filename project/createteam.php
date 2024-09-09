<?php
include_once("session.php");
?>
<?PHP
 include('connection.php'); 

 if(isset($_POST['action'])){
try {
$query = "INSERT INTO teams (Name, Skill, number, day, email) VALUES (:teamname, :skill, :playernumber, :day, :email)";
 $stmt = $conn ->prepare($query);

    $stmt->bindValue(':teamname', $_POST['teamname']);
    $stmt->bindValue(':skill', $_POST['skill']);
    $stmt->bindValue(':playernumber', 0);
    $stmt->bindValue(':day', $_POST['day']);
    $stmt->bindValue(':email', $useremail);

    $fin=$stmt -> execute();
    if($fin){
    $succ= "successful data entry";
    }

}
catch (PDOException $e) {
    echo die($e->getMessage()) ;
}}


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
       </ul>
   </nav>
   </div>
 <main>
<body>
   
        
    <FORM METHOD="POST" ACTION="<?php echo $_SERVER['PHP_SELF']?>" >
        <DIV ALIGN="CENTER"><CENTER>  
            <h1>
                New Team creation
            </h1>          
       <table  class="table" TABLE BORDER="1" WIDTH="500" CELLPADDING="2">
        <tr>
       <th> <label for="teamname" class="label-border">Team Name:</label></th>
       <td> <input type="text" id="teamname" name="teamname" required placeholder="Enter team name"></td>
        </tr>
        <tr>
       <th> <label for="skill" class="label-border">Level Skill:</label></th>
       <td><input type="text" id="skill" name="skill" pattern="[1-5]" placeholder="Enter team skill from 1-5"></td> 
        </tr>

        <tr>
        <th><label for="day" class="label-border">Game Day :</label></th>
        <td><input type="text" id="day" name="day" required placeholder="enter the day of the game"></td>
        </tr>
        <tr>
        <td  colspan="2" align="center">

              <button TYPE="submit" class="button" VALUE="Create" NAME="action" >
               <img src="images/create.png" alt="action" width="30" height="20">  
         </td> </tr>  

         <?php if (isset($succ)) { ?>
        <span class="successful">
            <?php echo $succ; ?>
        </span>
    <?php } ?>

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