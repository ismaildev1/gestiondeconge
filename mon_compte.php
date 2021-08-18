<?php 
 session_start();

 if(!isset($_SESSION['u']))
 {
	 header('location:sign.php');
 }
 else
 {  
   ?>
<!DOCTYPE HTML>
<!-- Page Wrapper -->
<html>
	<head>
		<title>Connexion</title>
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
                <div class="panel-heading">Veuillez saisir les nouveaux données de l'admin</div>
                <div class="panel-body">
                    <form method="post" action="mon_compte_2.php" class="form">
                    <div class="form-group">
                            <label for="niveau">user_name actuel:</label>
				                     <input type="text" name="user_name_actuel" 
                                   class="form-control" required/>
                        </div>
                        <div class="form-group">
                            <label for="niveau">password actuel:</label>
				                     <input type="password" name="password_actuel" 
                                   class="form-control" required/>
                        </div>
					          	<div class="form-group">
                            <label for="niveau">nouveau user_name:</label>
				                     <input type="text" name="user_name" 
                                   class="form-control" required/>
                        </div>
                        <div class="form-group">
                            <label for="niveau">nouveau mot de passe</label>
                            <input type="password" name="password" 
                                   class="form-control" required/>
                        </div>
                
                        <div class="form-group">
                            <label for="niveau">confirmer le mot de passe:</label>
				            <input type="password" name="confirmer" 
                                   class="form-control" required/>
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