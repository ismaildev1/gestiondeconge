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
$req = "SELECT * FROM employe INNER JOIN conge ON employe.doti = conge.f_doti and employe.doti =$dotie"; 
$req2 = "SELECT * FROM employe where doti =$dotie";  
$res =$con->query($req);
$res2 =$con->query($req2);
$reqCount="select count(id_conge) countemp from conge where f_doti = $dotie";
$resCount=$con->query($reqCount);
$tabCount=$resCount->fetch_assoc();
$nbrConge=$tabCount['countemp'];
?>  
<!DOCTYPE HTML>
<!-- Page Wrapper -->
<html>
	<head>
		<title>Historique</title>
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
						<li><a href="index.html">Acceuil</a></li>
					</ul>
				</div>
			</li>
		</ul>
	</nav>
</header>
        
        <div class="container">
<div style="margin-top:30px;" class="panel panel-success margetop60">
                <div>
                    <?php 
                     $row2 = $res2->fetch_assoc();
                     ?>
                     <table style="width:350px;">
                         <tr>
                             <td><label class="style_tab1" for="doti" name="doti">DOTI</td>
                             <td><?php echo $dotie ?></td>
                         </tr>
                         <tr>
                             <td><label class="style_tab1" for="nom_prenom " name="nom_prenom">Nom</td> 
                             <td><?php echo $row2['nom_prenom'] ?></td>
                         </tr>
                         <tr>
                             <td><label class="style_tab1" for="jours_s" name="jours_s">jours restants</td>
                             <td><?php echo $row2['jours_r'] ?></td>
                         </tr>
                     </table>
                    
                </div>
			</div>

            
            <div class="panel panel-primary">
                <div class="panel-heading">Liste des Conges (<?php echo $nbrConge ?> Conges)</div>
                <div class="panel-body">
                    <table class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th class="style_tab1">Id conge</th>
                                <th class="style_tab1">Duree</th>
                                <th class="style_tab1">la date de sortie</th>
                                <th class="style_tab1">la date d'entree</th>
                                <th class="style_tab1">Motif</th>
                                <th class="style_tab1">Actions</th>
                                
                            </tr>
                        </thead>
                        
                        <tbody>
                                <tr>
                                    <?php
                                while($row = mysqli_fetch_assoc($res))
                                {
                                ?>
                                    <td><?php echo $row['id_conge'] ?> </td>
                                    <td><?php echo $row['duree'] ?> </td>
                                    <td><?php echo $row['date_sortie'] ?> </td> 
                                    <td><?php echo $row['date_entree'] ?> </td> 
                                    <td><?php echo $row['motif']."<br/>" ?> </td> 
                                    <td>
                                    <a onclick="return confirm('Etes vous sur de vouloir supprimer ce congé ?')" href="supprimee_conge.php?id_conge=<?php echo $row['id_conge'] ?>"><span class="fas fa-trash-alt"></span></a>
									&nbsp;
									  
                                   </td>                           
                                </tr>
                                
                            <?PHP } ?>
                       </tbody>
                    </table>
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