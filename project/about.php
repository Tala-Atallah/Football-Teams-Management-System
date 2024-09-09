<?php
include_once("session.php");
?>

<!DOCTYPE html>
<html>
<html lang="en">

<head>
    <title>
        About Us
    </title>
    <link rel="stylesheet" type="text/css" href="styles.css">
</head>
<header>
    <img src="images/logo.png" alt="Logo" class="logo" >
    
    <h2> Football System Manager</h2>
    
    <a href="about.php">About us</a> 
    <a href="logout.php">log out</a> 
 
 </header>

 <main>
<body>    
    <FORM METHOD="POST" ACTION="<?php echo $_SERVER['PHP_SELF']?>" >
        <DIV ALIGN="CENTER"><CENTER> 
            <body>
        <p class="about">
        Welcome to the Football System Manager! We are a dedicated team passionate about managing football teams efficiently and effectively. Our system provides the tools and features you need to create and manage teams, add players, and perform various administrative tasks for your football organization.
        </p>  
        <p class="about">      With our user-friendly interface, you can easily create teams, assign players, edit team details, and even remove players when needed. Our goal is to streamline the management process and make it seamless for football enthusiasts like you.
</p>      
<p class="about">       Whether you are a professional club, amateur team, or simply a group of friends organizing matches, our Football System Manager is designed to cater to your needs. Stay organized, keep track of player information, and enjoy a hassle-free experience managing your football teams.
</p>
<p class="about">      Get started today and take your football management to the next level with the Football System Manager!
</p></body>
</CENTER>
        </DIV>
    </form>
</body>
</main>
<br>
<br>
<footer>
    <img src="images/logo.png" alt="Logo" class="logo1" >
    <p>email:football@info.com </p>
   <p> telephone:+97256789874</p>
    <a href="about.php">Contact Us</a> 

 </footer>
</html>
