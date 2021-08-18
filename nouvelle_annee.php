
<?php
session_start();

if(!isset($_SESSION['u']))
{
  header('location:sign.php');
}
else
{  
  
$con = mysqli_connect("localhost","root","","database1");
  //check date
  $req_date="update employe set jours_r = jours_r + 22";
  $q = mysqli_query($con , $req_date);

   if($q)
  {
    echo "<script> 
    window.alert('les 22 jours son bien ajoutés !');
    window.location.href='graphe.php';
   </script>"
    ; 
  }
}
  ?>

