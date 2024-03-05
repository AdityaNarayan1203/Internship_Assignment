<?php
  include 'connect.php';
  
  $login =0;
  $invalid=0;
  
  if($_SERVER['REQUEST_METHOD']=='POST'){
    
   
    $email = $_POST['email'];
    $password = $_POST['password'];

    $sql = "Select * from `assi` where email ='$email' and  password ='$password'";

    $result1 = mysqli_query($conn,$sql);
    if($result1){
      $num1 = mysqli_num_rows($result1);
      if($num1>0){
        //echo"loggedin successfully";
        $login=1;
        session_start();
        $_SESSION['email']=$email;
        header('location:dashboard.php');
      }
      else{
        //echo"login failed, invalid data";
        $invalid=1;

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
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" />
  <style>
     body {
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
      background: #eee;
    }
    #box{
         border: 2px solid black;
         box-shadow: 2px 3px 5px black;
         border-radius: 25px ;
         padding: 15px;
         width: 80%; 
         max-width: 500px;
         margin: 0 auto;
         
    }
    .fa{
      height: 100%;
    }
   .under{
     text-decoration: none;
     
   }
   .btn{
    margin-bottom: 10px;
   }
</style>
</head>
<body>
  <main class="container-sm">
  <?php
    if($login){
      echo '
      <div id="already-exist" style =" color:green; padding-top:10px;text-align:center;">Successfully login!</div>';
    }
  ?>
  <?php
  if($invalid){
      echo '
      <div id="already-exist" style =" color:red; padding-top:10px;text-align:center;">Invalid credentials!</div>';
    }
  ?>
      <form action="login.php" method="post">
      <div id="box">
         <div class="text-center">
            <h2>Login</h2>
         </div>
          <br>
          <div>
            <label>Email ID</label>
            <div class="input-group">
                  <div class="input-group-preppend">
                      <span class=" input-group-text fa fa-id-badge"></span>
                  </div>
                  <input class="form-control" type="text" name="email" >
                  <div class="input-group-append">
                  <span class=" input-group-text fa fa-star"></span>
            </div>
          </div>
          <br>
          <br>
          <div>
              <label>Password</label>
              <div class="input-group">
                  <div class="input-group-preppend">
                     <span class="input-group-text fa fa-id-badge"></span>
                  </div>
                  <input class="form-control" type="password" name="password">                  
                  <div class="input-group-append">
                      <span class="input-group-text fa fa-star"></span>
                  </div>

              </div>
           </div>
        
    </div>
    <br>
    <br>
    <div class="row ">
        <span class="ml-3">
            <button type="button" class="btn btn-outline-info"><span class="fa fa-user-friends"></span><a href="index.php" class="under">Sign up</a></button>
        </span>
        <span class="ml-5">
            <button type="submit" class="btn btn-outline-danger"><span class="fa fa-sign-in-alt"></span>Sign in</button>
        </span>
        
     </div>
    </div>
      </form>  
  </main>

  

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  <script>
    
    
      setTimeout(function(){
            document.getElementById('already-exist').style.display = 'none';
            window.location.href = 'index.php';
        }, 1000); 

    </script>
</body>
</html>