<?php 
	ini_set('display_errors', 'off');
	session_start(); 
	echo $_SESSION['header'];
	
	$bdd = new mysqli('localhost', 'root', '', 'moduleconnexion');
	$bdd->set_charset('utf8');
	
	if($bdd->connect_errno){
		echo 'Connexion interrompu'.$bdd->connect_errno.'|'.$bdd->connect_error;
	}
	
	if($_SESSION['login'] == 'admin' && $_SESSION['password'] == 'admin'){
		echo '<style>.liadmin {position: relative; z-index: 1; opacity: 1;}</style>';
	}
?>

<header>
	<img src="CSS/IMG/watermark.png" alt="Logo du site"/>
	<nav>
		<ul>
			<li><a href="index.php">Accueil</a></li>
			<li class="liconnexion"><a href="connexion.php">Connexion</a></li>
			<li class="liinscription"><a href="inscription.php">Inscription</a></li>
			<li class="liadmin"><a href="admin.php">Admin</a></li>
			<li class="liprofil"><a href="profil.php">Profil</a></li>
		</ul>
	</nav>
</header>