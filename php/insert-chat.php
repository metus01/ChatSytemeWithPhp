<?php 
session_start();
if(isset($_SESSION["unique_id"]))
{
  require "config.php";
   $incoming_id = htmlentities(htmlspecialchars($_POST["incoming_id"]));
   $outgoing_id = htmlentities(htmlspecialchars($_POST["outgoing_id"]));
  $message = htmlentities(htmlspecialchars(trim($_POST["message"])));
  if(!empty($message))
  {
    $sql = "INSERT INTO messages (incoming_msg_id , outgoing_msg_id , msg ) VALUES ('$incoming_id' , '$outgoing_id'  , '$message')";
    $stmt = $connexion->prepare($sql);
    $stmt->execute();
  }
}else
{
 header("Location:../login.php");
}
?>