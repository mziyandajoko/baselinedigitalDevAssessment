<?php
require 'function.php';
if(isset($_SESSION["id"])){
  header("Location: index.php");
}
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Register</title>
  </head>
  <body>
    <h2>Register</h2>
    <form autocomplete="off" action="" method="post">
      <input type="hidden" id="action" value="register">
      <label for="name">Name</label>
      <input type="text" id="name" value=""> <br>
      <label for="surname">Surname</label>
      <input type="text" id="surname" value=""> <br>
      <label for="email">email</label>
      <input type="email" id="email" value=""> <br>
      <label for="phoneNumber">phoneNumber</label>
      <input type="number" id="phoneNumber" value=""> <br>
      <label for="password">Password</label>
      <input type="password" id="password" value=""> <br>
      <button type="button" onclick="submitData();">Register</button>
    </form>
    <br>
    <a href="login.php">Login</a>
    <?php require 'script.php'; ?>
  </body>
</html>
