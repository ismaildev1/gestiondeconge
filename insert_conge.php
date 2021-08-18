<?php

 session_start();

 if(!isset($_SESSION['u']))
 {
	 header('location:sign.php');
 }
 else
 {  
   
    $con = mysqli_connect("localhost","root","","database1");
  
    
    $nom_prenom=isset($_POST['nom_prenom'])?$_POST['nom_prenom']:"";
    $duree=isset($_POST['duree'])?$_POST['duree']:"";
    $sortie=isset($_POST['sortie'])?($_POST['sortie']):"";
    $entree=isset($_POST['entree'])?$_POST['entree']:"";
    $motif=isset($_POST["motif"])?($_POST["motif"]):"";
 
      $req1="select doti from employe where nom_prenom='$nom_prenom'";
      $res =$con->query($req1);
      $row = $res->fetch_assoc();
      $doti= $row['doti'];
    

    $req_jours_r ="select jours_r from employe where doti = $doti ";
    $res_req_jours_r =$con->query($req_jours_r);
      $row_jours_r = $res_req_jours_r->fetch_assoc();
      $jours_r= $row_jours_r['jours_r'];
      if($jours_r>=$duree)
      {
        $requete2="update employe set jours_r = jours_r -  $duree where doti = $doti  "; 
        $q = mysqli_query($con , $requete2);
        $requete2="insert into conge (duree,date_sortie,date_entree,motif,f_doti) values($duree,'$sortie','$entree','$motif',$doti)";
        //$params=array($Doti,$nomeEmp,$dateEmp,$dateNaiss);
        $q1 = mysqli_query($con , $requete2);
      }
      else
      {
        echo "<script> 
        window.alert('erreur duree > jours_r !');
        window.location.href='nouvelle_conge.php';
      </script>"
        ; 
      }

    if($q) 
    { 
       echo "<script> 
       window.alert('congé bien ajouter !');
       window.location.href='graphe.php';
     </script>"
       ; 
    }
    else 
    {
        echo "<script> 
        window.alert('congé n'a pas bien ajouter !');
        window.location.href='nouvelle_conge.php';
      </script>"
        ; 
    }

  }
    
?>