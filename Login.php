
 <?php 
   include "DBInsert.php";

   $username = $password = "";
   $isValid = true;
   $usernameErr = $passwordErr ="";
   $successfulMessage = $errorMessage ="";
   if ($_SERVER['REQUEST_METHOD'] === "POST"){
    $username = $_POST['username'];
    $password = $_POST['password'];

   if (empty($username)) {
    $usernameErr = "user name can not be empty!";
    $isValid = false;
   
   }
     
   if (empty($password)) {
    $password = " password can not be empty!";
    $isValid = false;
   }
    if($isValid){

    $username = test_input($username);
    $password = test_input($password);

    $response = login($username, $password);
  }
    if($response) {
      $successfulMessage = "successfully saved.";
    }
    else {
      $errorMessage = "Error while saving.";
    }
   } 
  
 

  function test_input($data) {
     $data = trim($data);
     $data =  stripcslashes($data);
     $data =  htmlspecialchars($data);
     return $data;
}

?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>loginpage</title>
</head>
<body>
  <h1>login page</h1>
  <form action="" method="POST">
    <label for="username">username:</label>
    <input type="text" name="username" id="username">
        <span style="color:red"><?php echo $usernameErr;?></span>
        <br><br>
        <label for="password">password:</label>
    <input type="password" name="password" id="password">
        <span style="color:red"><?php echo $passwordErr;?></span>
        <br><br>
        
    <input type="submit" name="submit" value="Login">
      

  </form>
    <p style="color: red;"><?php echo $successfulMessage;?></p>
       <p style="color: red;"><?php echo $errorMessage;?></p>
       
       <br><br>
       <a href="reg.php">Click to Register</a>

</body>
</html>