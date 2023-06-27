<?php
session_start();
if (isset($_SESSION["unique_id"])) {
  if (isset($_GET["logout_id"])) {
    
    $logout_id = htmlentities(htmlspecialchars($_SESSION["unique_id"]));
    if (isset($logout_id)) {
      require  "config.php";
      $status = "Offline Now";
      $sql = $connexion->prepare(" UPDATE  users SET status = '{$status}' WHERE unique_id  = '{$_SESSION["unique_id"]}'");
      $sql->execute();
      if($sql->execute() ==  true )
      {
        session_unset();
        session_destroy();
        header("Location:../login.php");
      }else{
        header("Location:".$_SESSION["HTTP_REFERER"]);
      }

      
    }
  }
} else {
  header("Location:../login.php");
}
?>