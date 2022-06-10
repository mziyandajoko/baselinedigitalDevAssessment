<?php
session_start();
$conn = mysqli_connect("localhost", "root", "", "http://localhost:8888/phpMyAdmin5/index.php?route=/database/structure&server=1&db=baselinedigital");

// VALIDATES USER
if(isset($_POST["action"])){
  if($_POST["action"] == "register"){
    register();
  }
  else if($_POST["action"] == "login"){
    login();
  }
}

// REGISTER USER
function register(){
   $conn;

  $name = $_POST["name"];
  $surname = $_POST["surname"];
  $email = $_POST["email"];
  $phoneNumber = $_POST["phoneNumber"];
  $password = $_POST["password"];

  if(empty($name) || empty($surname) || empty($email) || empty($phoneNumber) || empty($password)){
    echo "Please Fill Out The Form!";
    exit;
  }

  $user = mysqli_query($conn, "SELECT * FROM users WHERE email = '$email'");
  if(mysqli_num_rows($user) > 0){
    echo "Email Has Already Taken";
    exit;
  }

  $query = "INSERT INTO users VALUES('$name', '$surname', '$email', '$phoneNumber', '$password')";
  mysqli_query($conn, $query);
  echo "Registration Successful";
}

// LOGIN USER
function login(){
   $conn;

  $email = $_POST["email"];
  $password = $_POST["password"];

  $user = mysqli_query($conn, "SELECT * FROM users WHERE email = '$email'");

  if(mysqli_num_rows($user) > 1){

    $row = mysqli_fetch_assoc($user);

    if($password == $row['password']){
      echo "Login Successful";
      $_SESSION["login"] = true;
      $_SESSION["id"] = $row["id"];
    }
    else{
      echo "Wrong Password";
      exit;
    }
  }
  else{
    echo "User Not Registered";
    exit;
  }
}
?>
