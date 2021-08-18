<?php
session_start();

if(!isset($_SESSION['u']))
{
  header('location:sign.php');
}
else
{  
    $con = mysqli_connect("localhost","root","","database1");
    
    
    $Doti=isset($_POST['doti'])?$_POST['doti']:"";
    $nomeEmp=isset($_POST['nomemp'])?$_POST['nomemp']:"";
    $jr=isset($_POST['jr'])?($_POST['jr']):"";
    $dateEmp=isset($_POST['dateemp'])?$_POST['dateemp']:"";
    $datenaiss=isset($_POST["dnaiss"])?($_POST["dnaiss"]):"";
    $grade=isset($_POST["grade"])?($_POST["grade"]):"";
    $cin=isset($_POST["cin"])?($_POST["cin"]):"";
    $adresse=isset($_POST["adresse"])?($_POST["adresse"]):"";
    
    
    $requete="insert into employe (doti,nom_prenom,jours_r,date_embauche,date_naissance,grade,cin,adresse) values($Doti,'$nomeEmp',$jr,'$dateEmp','$datenaiss','$grade','$cin','$adresse')";
    //$params=array($Doti,$nomeEmp,$dateEmp,$dateNaiss);
    
     $q = mysqli_query($con , $requete);

     if($q) { 
         header('location:graphe.php'); 
     ?> <span class="label label-success">Insertion avec succès!!</span> <?php } 
   
   else {
         echo mysqli_error($con);
     }

     echo $Doti,$nomeEmp,$jr,$dateEmp,$datenaiss ;

   // $resultat=$con->prepare($requete);
   // $resultat->execute(array($params));
}
    
?>
