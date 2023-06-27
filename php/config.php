<?php
   
   try
   {
      $connexion  = new PDO("mysql:host=localhost;dbname=rs","root",);
   }
   catch(PDOException $e)
   {
        echo "Erreur: ".$e->getMessage();
   }
