<html lang="fr">
	<head>
		<meta name="viewport" content="width=device-width">
		<link rel="stylesheet" href="CSS/index.css">
		<meta charset="UTF-8">
		<title>Module Connexion</title>
	</head>
	<body>
		<?php include 'mainheader.php' ?>
		<main class="main_profil">
			<div class="profil_head">
				<h1><?php echo 'Bonjour '.$_SESSION['prenom'].' !'; ?></h1>
				<form method="post">
					<input type="submit" name="quit" value="Déconnexion"/>
				</form>
			</div>
			<form class="changes" method="post">
				<div>
					<label for="login">Login</label></br>
						<input required name="login" type="text" value="<?php echo $_SESSION['login']; ?>" maxlength="255"/><br><br>
					<label for="prenom">Prénom</label></br>
						<input required name="prenom" type="text" value="<?php echo $_SESSION['prenom']; ?>" maxlength="255"/><br><br>
				</div>
				<div>
					<label for="nom">Nom</label></br>
						<input required name="nom" type="text" value="<?php echo $_SESSION['nom']; ?>" maxlength="255"/><br><br>
					<label for="password">Mot de passe</label><br>
						<input required name="password" value="<?php echo $_SESSION['password']; ?>" type="text" maxlength="255"/><br><br>
				</div>
				<input class="changesbutton" name="modify" type="submit" value="Modifier"/>
				</br></br><h2><?php echo  $_SESSION['message']?></h2>
			</form>
		</main>
		<?php include 'mainfooter.php' ?>
	</body>
</html>

<?php
	if(isset($_POST['quit'])){
		session_destroy();
		header('location: index.php');
	}
	if(isset($_POST['modify'])){
		$modif = $bdd->prepare('UPDATE utilisateurs SET login = "'.$_POST['login'].'", prenom = "'.$_POST['prenom'].'", nom = "'.$_POST['nom'].'", password = "'.$_POST['password'].'" WHERE login ="'.$_SESSION['login'].'"');
		$modif->execute();
		$_SESSION['login'] = $_POST['login'];
		$_SESSION['prenom'] = $_POST['prenom'];
		$_SESSION['nom'] = $_POST['nom'];
		$_SESSION['password'] = $_POST['password'];
		header('location: profil.php');
	}
?>