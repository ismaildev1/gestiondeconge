<?php
       session_start();
      
       if(!isset($_SESSION['u']))
       {
         header('location:sign.php');
       }
       else
       {  
    $con = mysqli_connect("localhost","root","","database1");

    $req1 ="select * from admin";
    $res1 =$con->query($req1);
      $row1 = $res1->fetch_assoc();
      $user_name= $row1['user_name'];
      $password= $row1['password'];

      $f_user_name_actuel=isset($_POST['user_name_actuel'])?$_POST['user_name_actuel']:"";
      $f_password_actuel=isset($_POST['password_actuel'])?$_POST['password_actuel']:"";
      $f_user_name=isset($_POST['user_name'])?$_POST['user_name']:"";
      $f_password=isset($_POST['password'])?$_POST['password']:"";
      $f_confirmer=isset($_POST['confirmer'])?$_POST['confirmer']:"";
      if($user_name == $f_user_name_actuel and $password ==  $f_password_actuel)
      {
        if( $f_password !=$f_confirmer)
        {
            echo "<script> 
            window.alert('ce mot de passe ne correspond pas à celui saisi dans le champ du mot de passe');
            window.location.href='mon_compte.php';
            </script>"
            ; 
        }
        else
        {
            $req2 ="update admin set user_name = '$f_user_name' , password = '$f_password' where user_name='$user_name'";
    
            $q = mysqli_query($con , $req2);
            if($q)
            {
                echo "<script> 
            window.alert('admin bien modifié');
            window.location.href='sign.php';
            </script>"
            ; 
            }
    
        }
      }
      else{
        echo "<script> 
        window.alert('password actuel ou mot de passe sont incorect');
        window.location.href='mon_compte.php';
        </script>"
        ; 
      }
   
      
       }
    
    
?>