<?php
session_start();

if(!isset($_SESSION['u']))
{
	header('location:sign.php');
}
else
{  

  $con = mysqli_connect("localhost","root","","database1");

  $req = "select nom_prenom from employe";
  $res =$con->query($req);
  $row = $res->fetch_assoc();
  
?>

<!DOCTYPE HTML>

<html>
	<head>
		<title>Nouveau congé</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
		<link rel="stylesheet" href="assets/css/main.css" />
        <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.css">
        <link rel="stylesheet" type="text/css" href="assets/css/fontawesome-all.min.css">
        <link rel="stylesheet" type="text/css" href="assete/css/noscript.css">
		<noscript><link rel="stylesheet" href="assets/css/noscript.css" /></noscript>
			<style>
	*,
*::before,
*::after {
	box-sizing: border-box;
}


label{
    color:black;
}
#id1{
    font-size: 22px;
			color:white;
			margin-left: 20px;
}
.style_tab1{
				font-family:monospace;
				font-size:16px;
				font-weight:bold;
				color:#4682b4;
			}

	</style>
	</head>
	<body >

		<!-- Page Wrapper -->
			<div id="page-wrapper">

				<!-- Header -->
				<header id="header">
					<a id="id1" href="logout.php">DPETLET</a>
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
			
                <body>
              
              <div class="container">
                             
                   <div style="margin-top:30px;" class="panel panel-primary margetop60">
                      <div class="panel-heading">Veuillez saisir les données du nouveau congé</div>
                      <div class="panel-body">
                          <form method="post" action="insert_conge.php" class="form">

                              <div class="form-group">
                                  <label class="style_tab1" for="niveau">Nom</label>
                                  <select name="nom_prenom" id="">
                                      <option name="nom_prenom" value="">---select nom---</option>
                                      <?php foreach ($res as $output) { ?>
                                        <option name="nom_prenom" value="<?php echo $output["nom_prenom"];?>"><?php echo $output["nom_prenom"];?></option>
                                        <?php } ?>
                                  </select>

                              </div>
                      
                              <div class="form-group">
                                  <label class="style_tab1" for="niveau">Duree</label>
                                  <input type="number" name="duree" 
                                         placeholder="duree"
                                         class="form-control" required/>
                              </div>
      
                              <div class="form-group">
                                  <label class="style_tab1" for="niveau">Date sortie</label>
                                  <input type="date" name="sortie" 
                                         placeholder="DATE_EMBAUCHE"
                                         class="form-control" required/>
                              </div>
                              <div class="form-group">
                                  <label class="style_tab1" for="entree">Date entree</label>
                                  <input type="date" name="entree" 
                                         placeholder="Date entree"
                                         class="form-control" required/>
                              </div>
                              <div class="form-group">
                                  <label class="style_tab1" for="motif">Motif</label>
                                  <input type="text" name="motif" 
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

</html>
<?php 
}
   ?>