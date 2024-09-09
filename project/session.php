<?php
session_start();

if (isset($_SESSION['email'])) {
    $useremail = $_SESSION['email'];
    

}
else
{
    header("Location: index.php");
}

?>