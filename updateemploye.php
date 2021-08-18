<?php
session_start();

if(!isset($_SESSION['u']))
{
  header('location:sign.php');
}
else
{  
  
    $con = mysqli_connect("localhost","root","","database1");
    
    
    $doti=isset($_POST['dotie'])?$_POST['dotie']:"";
    $nomeemp=isset($_POST['nomemp'])?$_POST['nomemp']:"";
    $jr=isset($_POST['jourr'])?($_POST['jourr']):"";
    $dateemp=isset($_POST['dateemp'])?$_POST['dateemp']:"";
    $datenaiss=isset($_POST["datenaiss"])?($_POST["datenaiss"]):"";
    $adresse=isset($_POST["adresse"])?($_POST["adresse"]):"";
    $cin=isset($_POST["cin"])?($_POST["cin"]):"";
    $grade=isset($_POST["grade"])?($_POST["grade"]):"";
    
    $requete=" UPDATE employe 
               SET  nom_prenom='$nomeemp' , jours_r=$jr , date_embauche='$dateemp' , date_naissance='$datenaiss' , adresse = '$adresse' , cin = '$cin' , grade = '$grade'
               WHERE doti=$doti ";
    //$params=array($Doti,$nomeEmp,$dateEmp,$dateNaiss);
    
     $q = mysqli_query($con , $requete);

     if($q) { 
      echo "<script> 
      window.alert('employe est bien modifier !');
      window.location.href='graphe.php';
    </script>"
      ; 
     }
 
         }

    
    
?>