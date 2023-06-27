<?php
session_start();
include_once "config.php";
$email = htmlentities(htmlspecialchars(trim($_POST["email"])));
$password = htmlentities(htmlspecialchars(trim($_POST["password"])));

if(!empty($email) && !empty($password))
{
  $sql = $connexion->query("SELECT * FROM users WHERE email = '{$email}' AND pwd = '{$password}'");
  if($sql->rowCount() > 0)
  {
       $row = $sql->fetch(PDO::FETCH_ASSOC);
       $_SESSION["unique_id"] = $row["unique_id"];
       $time = time();
       $status = "Online";
       $sql1 = $connexion->prepare("UPDATE users set last_seen = '{$time}' AND status = '{$status}' WHERE email = '{$email}' AND pwd = '{$password}'");
       $sql1->execute();
       PASSWORD_DEFAULT
       echo "success";
  }else
  {
    echo  " Email or password incorrect!";
  }
}else
{
  echo "All input fields  are require";
}
?>