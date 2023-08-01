<?php

include 'config.php';
session_start();

if(isset($_POST['submit'])){

   $email = mysqli_real_escape_string($conn, $_POST['email']);
   $pass = mysqli_real_escape_string($conn, md5($_POST['password']));

   $select = mysqli_query($conn, "SELECT * FROM `user_form` WHERE email = '$email' AND password = '$pass'") or die('query failed');

   if(mysqli_num_rows($select) > 0){
      $row = mysqli_fetch_assoc($select);
      $_SESSION['user_id'] = $row['id'];
      header('location:gotolaundry.php');
   }else{
      $message[] = 'incorrect password or email!';
   }

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>login</title>

   <!-- custom css file link  -->
   <link rel="stylesheet" href="style1.css">

</head>
<body>

<?php
if(isset($message)){
   foreach($message as $message){
      echo '<div class="message" onclick="this.remove();">'.$message.'</div>';
   }
}
?>
      <nav>
         <img src="logo.jpeg" class = "logo" width="100px" height="70px">
         <ul>
            <li><a class="active" href="#">Home</a></li>
            <li>
               <a href="#">Services
               <i class="fas fa-caret-down"></i>
               </a>
               <ul>
                  <li><a href="#">Wash</a></li>
                  <li><a href="#">Ironing</a></li>
                  <li><a href="#">Wash and fold</a></li>
               </ul>
            </li>
            <li><a href="#">Contact</a></li>
            <li><a href="feedback.html">Feedback</a></li>
            <li>
                <a href="#">Click here
                <i class="fas fa-caret-down"></i>
                </a>
                <ul>
                   <li><a href="login1.php">Login</a></li>
                   <li><a href="register.php">New user</a></li>
                   
                </ul>
             </li>
         </ul>
      </nav>  
    </body>
</html>