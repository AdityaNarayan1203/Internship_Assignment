<?php
 $HOSTNAME = 'localhost';
 $USERNAME = 'root';
 $PASSWORD = '';
 $DATABASE = 'assignment';

 $conn = mysqli_connect($HOSTNAME,$USERNAME,$PASSWORD,$DATABASE);

 if(!$conn){
   die(mysqli_error($conn));
 }
 
?>