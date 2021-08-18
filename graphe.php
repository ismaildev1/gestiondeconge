<?php
session_start();

if(!isset($_SESSION['u']))
{
	header('location:sign.php');
}
else
{


  $con = mysqli_connect("localhost","root","","database1");


  $nomemp=isset($_GET['nomemp'])?$_GET['nomemp']:"";
  $size=isset($_GET['size'])?$_GET['size']:6;
  $page=isset($_GET['page'])?$_GET['page']:1;
  $offset=($page-1)*$size;

  $req = "select * from employe
  where nom_prenom like '%$nomemp%'
   limit $size
   offset $offset";
 
  $reqCount="select count(doti) countemp from employe
  where nom_prenom like '%$nomemp%'";

    $res =$con->query($req);
	
    $resCount=$con->query($reqCount);

    $tabCount=$resCount->fetch_assoc();
    $nbremp=$tabCount['countemp'];
    $reste=$nbremp % $size;   // % operateur modulo: le reste de la division 
                                 //euclidienne de $nbrFiliere par $size
    if($reste===0) //$nbrFiliere est un multiple de $size
        $nbrPage=$nbremp/$size;   
    else
        $nbrPage=floor($nbremp/$size)+1;  // floor : la partie entière d'un nombre décimal
?>
<!DOCTYPE HTML>
<!-- Page Wrapper -->
<html>
	<head>
		<title>DPETLET</title>
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
						<li><a href="mon_compte.php">Mon compte</a></li>
						<li><a href="logout.php">Déconnexion</a></li>
					</ul>
				</div>
			</li>
		</ul>
	</nav>
</header>
			<div class="container">
				<div class="panel panel-success margetop60">
				
					<div class="panel-body">
					
						<form method="get" action="graphe.php" class="form-inline">
						
							<div class="form-group">
								<input type="text" name="nomemp" 
									class="form-control"
									value="<?php echo $nomemp ?>"/>		 
							</div>

							<button type="submit" class="btn btn-success">
								<span class='fas fa-search'></span>
								Chercher...
							</button>       
							&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
							<a href="nouvelleemploye.php">
										
									<span class="glyphicon glyphicon-plus"></span>
										
									 Nouveau Employé
										
									</a> 
									&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
									<a href="nouvelle_conge.php">
										
									<span class="glyphicon glyphicon-plus"></span>
										
									 Nouveau congé
										
									</a> 
									&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
									<a style="color:red" onclick="return confirm('Etes vous sur de vouloir ajoutés les 22 jours !!!')" href="nouvelle_annee.php">
										
									<span class="glyphicon glyphicon-plus"></span>
										
									 nouvelle_annee
										
									</a> 
									
						</form>
		           </div>
	           </div>
			   <div class="panel panel-primary">
                <div class="panel-heading">Liste des employés (<?php echo $nbremp ?> employés)</div>
                <div class="panel-body">
				<table class="table table-striped table-bordered">
				<thead>
					
					<tr > 
						
							<th class="style_tab1">DOTI</th>
							<th class="style_tab1">Nom Prénom</th>
							<th class="style_tab1">Grade</th>
							<th class="style_tab1" >Date Naissance</th>
							<th class="style_tab1">Date Position</th>
							<th class="style_tab1">Cin</th>
							<th class="style_tab1">Adresse</th>
							<th class="style_tab1">Jours Restants</th>
							<th class="style_tab1">Actions</th>
				        
					</tr>
		
				</thead>
				<?php
				while($row = mysqli_fetch_assoc($res))
				{ ?>
						<tbody>
							<tr>
								<td><?php echo $row['doti'] ?></td>
								<td><?php echo $row['nom_prenom'] ?></td>
								<td><?php echo $row['grade'] ?></td>
								<td><?php echo $row['date_naissance'] ?></td>
								<td><?php echo $row['date_embauche'] ?></td>
								<td><?php echo $row['cin'] ?></td>
								<td ><?php echo $row['adresse'] ?></td>
								<td><?php echo $row['jours_r']."<br/>" ?></td>
								<td>



									<a  href="editeremploye.php?dotie=<?php echo $row['doti'] ?>" style="text-decoration: none;"><span class="fas fa-user-edit"></span></a>
									&nbsp;
									<a onclick="return confirm('Etes vous sur de vouloir supprimer l employe')" href="supprimeremploye.php?dotie=<?php echo $row['doti'] ?>"><span class="fas fa-trash-alt"></span></a>
									&nbsp;
									<a href="historyconge.php?dotie=<?php echo $row['doti'] ?>"><span class="fas fa-history"></span></a>

								</td>
							</tr>
							<?php
								}
							?>
						</tbody>
					</table>
					<div>
                    <ul class="pagination">
                        <?php for($i=1;$i<=$nbrPage;$i++){ ?>
                            <li class="<?php if($i==$page) echo 'active' ?>"> 
            <a href="graphe.php?page=<?php echo $i;?>&nomemp=<?php echo $nomemp?>">
                                    <?php echo $i; ?>
                                </a> 
                             </li>
                        <?php } ?>
                    </ul>
                </div>
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
<?php } ?>