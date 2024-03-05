<?php
include 'connect.php';
// Check if form is submitted
$chk_pass = 0;
$con_message = 0;
$chk_email = 0;
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $name = $_POST["name"];
    $email = $_POST["email"];
    $number = $_POST["number"];
    $date = $_POST["date"];
    $password = $_POST["password"];
    $confirm_password = $_POST["confirm_password"];
    $gender = $_POST["gender"];


    $check_query = "SELECT * FROM assi WHERE email='$email'";
    $result = mysqli_query($conn, $check_query);
    
    if ($password != $confirm_password) {
      // echo "Passwords do not match";
      $chk_pass = 1;
    }
    elseif(mysqli_num_rows($result) > 0){
      $chk_email = 1;
    }
    else{
       
      // Check connection
       if ($conn->connect_error) {
          die("Connection failed: " . $conn->connect_error);
        }

      // Prepare SQL statement to insert data into database
       $sql = "INSERT INTO assi (name, email, number, date, password, gender) 
          VALUES ('$name', '$email', '$number', '$date', '$password', '$gender')";

       if (mysqli_query($conn, $sql)) {
          // echo "New record created successfully";
          $con_message = 1;
       } else {
          echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }
    }
}
?>




<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  <style>
     body {
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
      background: #eee;
    }
     #anc{
          text-decoration: none;
          
         }
      #box1{
        align-items: center;
          border: 2px solid black;
          box-shadow: 2px 3px 5px black;
          border-radius: 25px ;
          padding: 15px;
          max-width: 500px;
          margin:0 auto;
          }
  </style>
</head>
<body>
  <main class="container-sm">
  <?php
    if($chk_pass){
      echo '
      <div id="already-exist" style =" color:red; padding-top:10px;text-align:center;">Password do not match!</div>';
    }
  ?>
  <?php
   if($con_message){
      echo '
      <div id="already-exist" style =" color:green; padding-top:10px;text-align:center;">Sign Up successfull!</div>';
    }
    ?>
    <?php
   if($chk_email){
      echo '
      <div id="already-exist" style =" color:green; padding-top:10px;text-align:center;">User already exist!</div>';
    }
    ?>
    <div id="box1">
        <div class="text-center"><h2>Sign Up Form</h2></div>
        <br>
         <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
         <div>
           <div class="form-group">
               <label>Full Name:</label>
               <input  type="text" class="form-control" name="name">
           </div>
           <div class="form-group">
             <label>Email:</label>
             <input  type="text" class="form-control" name="email">
            </div>
            <div class="form-group">
             <label>Mobile:</label>
             <input  type="tel" class="form-control" name="number">
            </div>
            <div class="form-group">
             <label>Date:</label>
             <input  type="date" class="form-control" name="date">
            </div>
            <div class="form-group">
             <label>Password:</label>
             <input  type="Password" class="form-control" name="password">
            </div>
            <div class="form-group">
             <label>Confirm Password:</label>
             <input  type="Password" class="form-control" name="confirm_password">
            </div>
             <div>
                 <label>Gender:</label>
                 <input type="radio" name="gender" value="male">Male
                 <input type="radio" name="gender" value="female">Female
             </div>  
             
         </div>
         <br>
         <div>
             <span>
                <button type="button" class="btn btn-light"><a href="login.php" id="anc">Allready you have an account</a>
                </button>
            </span>
             <span>
                <button type="submit" class="btn btn-secondary ml-5">Signup</button>
             </span>
         </div>

         </form>
    </div>
       

</main>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
<script>
    setTimeout(function(){
            document.getElementById('already-exist').style.display = 'none';
        }, 3000); 


</script>
</body>
</html>
