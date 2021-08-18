<?php
session_start();

if(!isset($_SESSION['u']))
{
  header('location:sign.php');
}
else
{  

       
    $con = mysqli_connect("localhost","root","","database1");
    
    
    $id_conge=isset($_GET['id_conge'])?$_GET['id_conge']:"";
//doti
    $req2="select f_doti dotie from conge where id_conge = $id_conge";
    $res2=$con->query($req2);
    $row = $res2->fetch_assoc();
    $dotie=$row['dotie'];
//duree
$req3="select duree dureee from conge where id_conge = $id_conge";
$res3=$con->query($req3);
$t3=$res3->fetch_assoc();
$duree=$t3['dureee'];

    $requete=" DELETE FROM conge WHERE id_conge=$id_conge ";

    
     $q = mysqli_query($con , $requete);

     $requete2=" update employe set jours_r = jours_r + $duree WHERE doti=$dotie ";
     $q2 = mysqli_query($con , $requete2);
     if($q) 
     { 
        echo "<script> 
        window.alert('congé bien supprimer !');
        window.location.href='graphe.php';
      </script>"
        ; 
     }
     else 
     {
       echo mysqli_error($con);
     }
    
}
    
    
?>