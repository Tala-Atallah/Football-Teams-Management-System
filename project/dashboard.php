<?php
include_once("session.php");
?>
 <?php
include_once('connection.php');
try {
    $query = "SELECT teams.id, teams.Name, teams.Skill, COUNT(players.teamid) AS playerCount , teams.day FROM teams
    LEFT JOIN players ON teams.id = players.teamid
    GROUP BY teams.id";
    $dbResults = $conn->query($query);
    $rows = $dbResults->fetchAll();

    
          

}
catch (PDOException $e) {
    die($e->getMessage());
}
?> 
<!DOCTYPE html>
<html>
<head>
    <title>Dashboard</title>
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
<h1>Dashboard</h1>
<table class="table" TABLE BORDER="1" WIDTH="500" CELLPADDING="2">
    <tr>
      <th> </th>  
      <th>Team Name</th>  
      <th>Team Skill (1-5)</th>
      <th>Number of Players</th>
      <th>Game Day</th>
    </tr>

    <tbody>

<?php foreach ($rows as $row):?>
<tr>
    <td><?php echo $row['id']?></td>
    <td><a href="details.php?id=<?=$row['id']?> &num=<?php echo $row['playerCount']; ?>"><?php echo $row['Name']?></a></td>
    <td><?php echo $row['Skill']?></td>
    <td><?php echo $row['playerCount']?></td>
    <td><?php echo $row['day']?></td>


</tr>
<?php endforeach;?>

   
    <tr>
        <td  colspan="5" align="center">
            <a href="createteam.php">
                <button type="button">
               <img src="images/create.png"  width="30" height="20"> 
               </button>
           </td>
    </tr>
    </tbody>
</table>
</CENTER></DIV>
</FORM>
</body>
</main>
<footer>
    <img src="images/logo.png" alt="Logo" class="logo1" >
    <p>email:football@info.com </p>
   <p> telephone:+97256789874</p>
    <a href="about.php">Contact Us</a> 

 </footer>
 </html>

