<?php
include_once("../inc/Conn.php");
include_once("../helpers/helperDev.php");
session_start();

$conne = new Mysql();
$conn = $conne->dbConnect();

$action = $_POST["action"];
$Email = $_POST['email'];
$Password = $_POST['password'];

if($action==1){
  $query = $conn->query("SELECT * FROM users WHERE email='$Email' && password_='$Password'",PDO::FETCH_ASSOC);
  if ($count = $query -> rowCount()){
      if($count > 0){
          // Email and password match
          $sql = "SELECT user_id,firstname,surname,username,is_verified,is_admin 
                  FROM users WHERE email='$Email' && password_='$Password'";
          $q = $conn->query($sql);
          $q->setFetchMode(PDO::FETCH_ASSOC);
          while($r=$q->fetch()){
              $_SESSION["user_UserID"]=$r['user_id'];
              $_SESSION["user_Username"]=$r['username'];
              $_SESSION["user_Firstname"]=$r['firstname'];
              $_SESSION["user_Surname"]=$r['surname'];
              $_SESSION["user_isAdmin"]=$r['is_admin'];
              $_SESSION["user_isVerified"]=$r['is_verified'];
          }
          $_SESSION["user_Email"]=$Email;
      echo 1;
    }else{
        // System-based error
        echo -1;
    }
  }
  else{
      // Email and password does not match
      echo 0;
  }
}
?>