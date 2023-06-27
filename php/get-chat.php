<?php 
session_start();
if(isset($_SESSION["unique_id"]))
{
  include_once "config.php";
  $outgoing_id = htmlentities(htmlspecialchars($_POST["outgoing_id"]));
  $incoming_id = htmlentities(htmlspecialchars($_POST["incoming_id"]));
  $output = "" ;
  $sql = " SELECT * FROM messages LEFT JOIN  users ON Users.unique_id = Messages.incoming_msg_id  WHERE (outgoing_msg_id = $outgoing_id AND  incoming_msg_id = $incoming_id ) OR (incoming_msg_id = $outgoing_id AND outgoing_msg_id = $incoming_id )  ORDER BY msg_id ";
  $query = $connexion ->prepare($sql);
  $query->execute();
  $msg_suppr = "Message supprimé";
  if($query->rowCount() > 0)
  {
    while($row  = $query->fetch(PDO::FETCH_ASSOC))
     {
      if($row["outgoing_msg_id"] ===  $outgoing_id)
       {
       $output.= '<div class="chat outgoing">
       <div class="details">
         <p>'.$row["msg"];
         
         if($row["msg"] !== $msg_suppr){ 
          $output.= '<a href = "php/delete.php?msg_id='.$row["msg_id"].' "onclick="alert("Voulez-vous vraiment supprimer ce message ??")"><i class="fas fa-trash"></i></a>';
           };
         ;
        ;
         $output.= '</p></div> 
        </div> ';
        }else
       {
         $output.='<div class="chat incoming">
         <img src="php/uploads/'.$row["img"].'" alt="">
          <div class="details">
            <p>'.$row["msg"].' </p>
          </div>
        </div>';
        
        }
        echo $output;
      
    }
    
    }
    }else
    {
     header("Location:../login.php");
    }
