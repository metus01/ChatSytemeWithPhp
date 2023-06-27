<?php
session_start();
$outgoing_id  = $_SESSION["unique_id"];
include_once "config.php";
$searchTerm = htmlentities($_POST["searchTerm"]);
$output = "";
$sql  = $connexion->query("SELECT  * FROM users WHERE NOT unique_id  = {$outgoing_id} AND ( fname LIKE '%{$searchTerm}%' OR lname LIKE '%{$searchTerm}%')" );
if($sql->rowCount() > 0)
{
   require "data.php";
}else
{
  $output.= "No user found to your search ";
}
echo $output;
?>