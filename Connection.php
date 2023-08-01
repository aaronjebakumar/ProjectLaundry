<?php
   $host = 'localhost';
   $user = 'root';
   $pass = '';
   $dbname = 'laundry';

   $conn = mysqli_connect($host, $user, $pass, $dbname);
   if(!$conn)
   {
   	 die(mysqli_connect_error());
   }
?>