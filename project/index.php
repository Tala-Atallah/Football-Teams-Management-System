<?php
session_start();
if(isset($_POST['Submit'])){

       try {
         include_once("connection.php");

    $password = $_POST['userpassword'];
    $confirmPassword = $_POST['userpassword2'];

    if ($password === $confirmPassword) {

        
    
          $username = $_POST['username'];
          $email = $_POST['email'];
          
          $stmt = $conn->prepare("SELECT COUNT(*) FROM user WHERE username = :username OR email = :email");
          $stmt->bindParam(':username', $_POST['username']);
          $stmt->bindParam(':email', $_POST['email']);
          $stmt->execute();
          $count = $stmt->fetchColumn();
            if($count==0){
           $sql = "INSERT INTO user(username ,email , password) VALUES (:username,:email,:userpassword)";
           $stmt = $conn ->prepare($sql);

           $stmt->bindValue(':username', $_POST['username']);
           $stmt->bindValue(':email', $_POST['email']);
           $stmt->bindValue(':userpassword', $_POST['userpassword']);
           $fin=$stmt -> execute();
           if($fin){
            $succ="Data Inserted Successfully";

           }}
       
       else {
        
         $error="Unsuccessful Sign Up. Username or email are used";}
      }
      else {
         $error2 = "Passwords do not match!";
     }
   }
       catch (PDOException $e) {
           echo die($e->getMessage()) ;
       }}

?>

<?php
 if(isset($_POST['insert'])){
  

       try {
         include_once("connection.php");


           $sql = "SELECT * FROM user WHERE email = :email AND password = :userpassword";
           $usersql ="SELECT * FROM user WHERE username = :username";
           $stmt = $conn ->prepare($sql);

          
           $useremail = $_POST['email'];

           $stmt->bindValue(':email', $useremail);
           $stmt->bindValue(':userpassword', $_POST['userpassword']);
           $stmt -> execute();
           $rowCount = $stmt->rowCount();
           
           if ($rowCount > 0) {
             $_SESSION['email']= $useremail;

             header("Location: dashboard.php");
         }
          
        else {
         $error3="User not found";
     }
 }
       
       catch (PDOException $e) {
           echo die($e->getMessage()) ;
       }}
?>

<!DOCTYPE html>

<HTML>
<HEAD>
<TITLE>Welcome to your Account</TITLE>

   <link rel="stylesheet" type="text/css" href="styles.css">

</HEAD>
<header>
       <figure>
   <img src="images/logo.png" alt="Logo" class="logo" >
    </figure>
   <h2><em> Football System Manager</em></h2>
   <a href="about.php">About us</a> 

</header>

<BODY>
<FORM METHOD="POST" ACTION="<?php echo $_SERVER['PHP_SELF']?>" >
   <DIV ALIGN="CENTER"><CENTER>
      <H3>Welcome</H3>
   <TABLE class="table" BORDER="1" WIDTH="200" CELLPADDING="2">
      <TR>
         <TH WIDTH="100%" COLSPAN="2" ALIGN="CENTER" NOWRAP>
           Sign Up
         </TH>
      </TR>
      <TR>
         <TH WIDTH="20%" ALIGN="RIGHT" NOWRAP>Username:</TH>
         <TD WIDTH="80%" NOWRAP>
            <INPUT TYPE="TEXT" NAME="username" required SIZE="10">
         </TD>
      </TR>

      <TR>
        <TH WIDTH="20%" ALIGN="RIGHT" NOWRAP>Email:</TH>
        <TD WIDTH="80%" NOWRAP>
           <INPUT TYPE="email" NAME="email" required SIZE="10">
          

        </TD>
     </TR>
      <TR>
         <TH WIDTH="20%" ALIGN="RIGHT" NOWRAP>Password:</TH>
         <TD WIDTH="80%" NOWRAP>
            <INPUT TYPE="PASSWORD" NAME="userpassword" required minlength="8"  SIZE="10">
         </TD>
      </TR>
    
     <TR>
        <TH WIDTH="20%" ALIGN="RIGHT" NOWRAP>Repeat Password:</TH>
        <TD WIDTH="80%" NOWRAP>
           <INPUT TYPE="PASSWORD" NAME="userpassword2"required minlength="8"  SIZE="10">
        </TD>
     </TR>
      <TR>
         <TD WIDTH="100%" COLSPAN="2" ALIGN="CENTER" NOWRAP>
            <button TYPE="SUBMIT" class="button" VALUE="SIGNUP" NAME="Submit" >
               <img src="images/sign.png" alt="submit" width="50" height="20">
            </button>
            
         </TD>
      </TR>
      <?php if (isset($succ)) { ?>
        <span class="successful">
            <?php echo $succ; ?>
        </span>
    <?php } ?>
      <?php if (isset($error)) { ?>
        <span class="error">
            <?php echo $error; ?>
        </span>
    <?php } ?>

    <?php if (isset($error2)) { ?>
        <span class="error">
            <?php echo $error2; ?>
        </span>
    <?php } ?>
  
   </TABLE>


   </CENTER></DIV>
<br>
<br>
</FORM>
</BODY>
<body>
<form METHOD="POST" ACTION="">
<DIV ALIGN="CENTER"><CENTER>
     
     <TABLE class="table" BORDER="1" WIDTH="200" CELLPADDING="2">
        <TR>
           <TH WIDTH="100%" COLSPAN="2" ALIGN="CENTER" NOWRAP>
             Log in
           </TH>
        </TR>
      
  
        <TR>
          <TH WIDTH="20%" ALIGN="RIGHT" NOWRAP>Email:</TH>
          <TD WIDTH="80%" NOWRAP>
             <INPUT TYPE="TEXT" NAME="email" required  SIZE="10">
          </TD>
       </TR>
        <TR>
           <TH WIDTH="20%" ALIGN="RIGHT" NOWRAP>Password:</TH>
           <TD WIDTH="80%" NOWRAP>
              <INPUT TYPE="PASSWORD" NAME="userpassword"required minlength="8"  SIZE="10">
           </TD>
        </TR>
      
        <TR>
           <TD WIDTH="100%" COLSPAN="2" ALIGN="CENTER" NOWRAP>
           <button TYPE="SUBMIT" class="button" VALUE="SIGNUP" NAME="insert" >
               <img src="images/login.jpg" alt="insert" width="60" height="20">           </TD>
        </TR>
        <?php if (isset($error3)) { ?>
        <span class="error">
            <?php echo $error3; ?>
        </span>
    <?php } ?>
     </TABLE>
     </CENTER></DIV>
   
</form>
</body>
<footer>
   <img src="images/logo.png" alt="Logo" class="logo1" >
   <p>email:football@info.com</p>
   <p>telephone:+97256789874</p>
   <a href="about.php">Contact Us</a> 

</footer>
</HTML>