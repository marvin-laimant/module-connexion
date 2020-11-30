<html lang="fr">
	<head>
		<meta name="viewport" content="width=device-width">
		<link rel="stylesheet" href="CSS/index.css">
		<meta charset="UTF-8">
		<title>Module Connexion</title>
	</head>
	<body>
		<?php include 'mainheader.php' ?>
		<main class="main_connexion">
			<form method="post">
				<label for="login">Login</label></br>
					<input required type="text" name="login" placeholder="Ex: zaza124"/></br></br>
				<label for="password">Mot de passe</label></br>
					<input required type="password" name="password"/></br></br>
				<input type="submit" value="Connexion"/>
			</form>
			<h2 color="red"><?php echo  $_SESSION['message1']?></h2>
		</main>
		<?php include 'mainfooter.php' ?>
	</body>
</html>

<?php
	$querybase = 'SELECT * FROM utilisateurs WHERE login="'.$_POST['login'].'" AND password="'.$_POST['password'].'"';
	$query = $bdd->query($querybase);
	
	while($ligne = $query->fetch_assoc()){
		$prenom = $ligne['prenom'];
		$_SESSION['nom'] = $ligne['nom'];
	}
	
	if(!empty($_POST['login']) && !empty($_POST['password'])){
		if(mysqli_num_rows($query) == 0){
			$_SESSION['message1'] = 'Login ou Mot de passe incorrect';
			header('refresh: 0');
		}
		else{
			$_SESSION['login'] = $_POST['login'];
			$_SESSION['password'] = $_POST['password'];
			$_SESSION['prenom'] = $prenom;
			$_SESSION['header'] = '<style>.liconnexion, .liinscription{position: absolute; z-index: -10; left: 2000px; opacity: 0;} .liprofil{position: relative; z-index: 1; opacity: 1;}</style>';
			header('location: profil.php');
		}
	}
?>