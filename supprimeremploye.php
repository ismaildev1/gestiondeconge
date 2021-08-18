<?php
       session_start();
      
       if(!isset($_SESSION['u']))
       {
           header('location:sign.php');
       }
       else
       {  
    $con = mysqli_connect("localhost","root","","database1");
    
    $doti=isset($_GET['dotie'])?$_GET['dotie']:"";

    $requete1=" DELETE FROM conge WHERE f_doti=$doti ";
     $q1 = mysqli_query($con , $requete1);
    
    
    $requete=" DELETE FROM employe WHERE DOTI=$doti ";
     $q = mysqli_query($con , $requete);

     if($q) { 
        header('location:graphe.php'); 
    ?> <span class="label label-success">Insertion avec succès!!</span> <?php } 
  
  else {
        echo mysqli_error($con);
    }
    
    
}
    
?>