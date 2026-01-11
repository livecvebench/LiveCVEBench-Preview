 <?php 

session_start();
session_unset($_SESSION['userid']);
session_unset($_SESSION['fname']);
session_unset($_SESSION['lname']);
session_unset($_SESSION['position']);
session_unset($_SESSION['cart']);
header("Location: ../index.php");
?>