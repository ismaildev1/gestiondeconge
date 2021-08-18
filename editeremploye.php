<?php
   session_start();
  
   if(!isset($_SESSION['u']))
   {
       header('location:sign.php');
   }
   else
   {  
     
   $con = mysqli_connect("localhost","root","","database1");
 
    $dotie=isset($_GET['dotie'])?$_GET['dotie']:0;

    //$requete="select * from employe where DOTI=$dotie";

    $res = $con->query("SELECT * FROM employe WHERE DOTI=$dotie");
    $row = $res->fetch_assoc();

   // $employe=$resultat->get_result()->fetch_all();
    //echo $employe ;
    $nomemp=$row['nom_prenom'];
    $jourr=$row['jours_r'];
    $dateemp=$row['date_embauche'];
    $datenaiss=$row['date_naissance'];
    $adresse=$row['adresse'];
    $cin=$row['cin'];
    $grade=$row['grade'];
    
    
?>
<!DOCTYPE HTML>
<!-- Page Wrapper -->
<html>
	<head>
		<title>modifier employé</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
		<link rel="stylesheet" href="assets/css/main.css" />
		<noscript><link rel="stylesheet" href="assets/css/noscript.css" /></noscript>
		<link rel="stylesheet" type="text/css" href="assets/css/bootstrap.css">
        <link rel="stylesheet" type="text/css" href="assets/css/font-awesome.min.css">
		<style>
			#id1{
			font-size: 22px;
			color:white;
			margin-left: 20px;
			}
            label{
                color:black;
            }
            .style_tab1{
				font-family:monospace;
				font-size:16px;
				font-weight:bold;
				color:#4682b4;
			}
		</style>
	</head>
	<body  >
		<!-- Page Wrapper -->
		<div id="page-wrapper">

<!-- Header -->
<header id="header">
	<a id ="id1" href="logout.php">DPETLET</a>
	<nav id="nav">
		<ul>
			<li class="special">
				<a href="#menu" class="menuToggle"><span>Menu</a>
				<div style="background-color: #2f3136;" id="menu">
					<ul>
						<li><a href="logout.php">Acceuil</a></li>
	
					</ul>
				</div>
			</li>
		</ul>
	</nav>
</header>
        <div class="container">
                       
             <div style="margin-top:30px;" class="panel panel-primary margetop60">
                <div class="panel-heading">Edition de la filière :</div>
                <div class="panel-body">
                    <form method="post" action="updateemploye.php" class="form">
						<div class="form-group">
                             <label class="style_tab1" for="niveau"> DOTI : <?php echo $dotie ?></label>
                            <input type="hidden" name="dotie" 
                                   class="form-control"
                                    value="<?php echo $dotie ?>"/>
                        </div>
                        
                        <div class="form-group">
                             <label class="style_tab1" for="niveau">Nom</label>
                            <input type="text" name="nomemp" 
                                   placeholder="le nome de l'employe"
                                   class="form-control"
                                   value="<?php echo $nomemp ?>" required/>
                        </div>
                        <div class="form-group">
                             <label class="style_tab1" for="niveau">Jours restants</label>
                            <input type="number" name="jourr" 
                                   placeholder="nbr de jour rest"
                                   class="form-control"
                                   value="<?php echo $jourr ?>" required/>
                        </div>
                        <div class="form-group">
                             <label class="style_tab1" for="niveau">Date de position </label>
                            <input type="date" name="dateemp" 
                                   placeholder="date d'embauche"
                                   class="form-control"
                                   value="<?php echo $dateemp ?>" required/>
                        </div>
                        <div class="form-group">
                             <label class="style_tab1" for="niveau">Date de naissance</label>
                            <input type="date" name="datenaiss" 
                                   placeholder="date de naissance"
                                   class="form-control"
                                   value="<?php echo $datenaiss ?>" required/>
                        </div>
                        <div class="form-group">
                             <label class="style_tab1" for="niveau">Adresse</label>
                            <input type="text" name="adresse" 
                                   placeholder="adresse"
                                   class="form-control"
                                   value="<?php echo $adresse ?>" required/>
                        </div>
                        <div class="form-group">
                             <label class="style_tab1" for="niveau">Cin</label>
                            <input type="text" name="cin" 
                                   placeholder="cin"
                                   class="form-control"
                                   value="<?php echo $cin ?>" required/>
                        </div>
                        <div class="form-group">
                             <label class="style_tab1" for="niveau">Grade</label>
                            <input type="text" name="grade" 
                                   placeholder="grade"
                                   class="form-control"
                                   value="<?php echo $grade ?>" required/>
                        </div>
                        
                        
                        
				        <button type="submit" class="btn btn-success">
                            <span class="glyphicon glyphicon-save"></span>
                            Enregistrer
                        </button> 
                      
					</form>
                </div>
            </div>   
        </div>      
    </body>
    <footer id="footer">
					<ul class="copyright">
						<li>&copy; Copyright 2021 METLE</li><li>Tous droits réservés</li>
					</ul>
				</footer>
				<!-- Scripts -->
			<script src="assets/js/jquery.min.js"></script>
			<script src="assets/js/jquery.scrollex.min.js"></script>
			<script src="assets/js/jquery.scrolly.min.js"></script>
			<script src="assets/js/browser.min.js"></script>
			<script src="assets/js/breakpoints.min.js"></script>
			<script src="assets/js/util.js"></script>
			<script src="assets/js/main.js"></script>
				<script>
					const switchers = [...document.querySelectorAll('.switcher')]

					switchers.forEach(item => {
						item.addEventListener('click', function() {
							switchers.forEach(item => item.parentElement.classList.remove('is-active'))
							this.parentElement.classList.add('is-active')
						})
					})
				</script>
</HTML>
<?php 
   }
   ?>