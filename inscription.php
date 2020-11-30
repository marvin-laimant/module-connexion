<html lang="fr">
	<head>
		<meta name="viewport" content="width=device-width">
		<link rel="stylesheet" href="CSS/index.css">
		<meta charset="UTF-8">
		<title>Module Connexion</title>
	</head>
	<body>
		<?php include 'mainheader.php' ?>
		<main class="main_inscription">
			<h2><i>Inscription</i></h2>
			<form method="post">
				<label for="login">Login</label></br>
					<input required name="login" type="text" placeholder="Ex: zaza124" maxlength="255"/><br><br>
				<label for="prenom">Prénom</label></br>
					<input required name="prenom" type="text" placeholder="Ex: Manu" maxlength="255"/><br><br>
				<label for="nom">Nom</label></br>
					<input required name="nom" type="text" placeholder="Ex: Macaron" maxlength="255"/><br><br>
				<label for="password">Mot de passe</label><br>
					<input required name="password" type="password" maxlength="255"/><br><br>
				<label for="confirmpassword">Confirmer Mot de passe</label><br>
					<input required name="confirmpassword" type="password" maxlength="255"/><br><br>
				<input type="submit" value="Inscription"/>
				</br></br><h2><?php echo  $_SESSION['message']?></h2>
			</form>
		</main>
		<?php include 'mainfooter.php' ?>
	</body>
</html>

<?php
	if(!empty($_POST['login']) && !empty($_POST['prenom']) && !empty($_POST['nom']) && !empty($_POST['password'])){
		$_SESSION['login'] = $_POST['login'];
		
		$prenom = $_POST['prenom'];
		$nom = $_POST['nom'];
		$password = $_POST['password'];
		$confirmpassword = $_POST['confirmpassword'];
		
		$querybase = 'SELECT login FROM utilisateurs WHERE login="'.$_SESSION['login'].'"';
		$query = $bdd->query($querybase);
		
		if($password == $confirmpassword){
			if(mysqli_num_rows($query) == 0){
				$_SESSION['message'] = ' ';
				$_SESSION['id'] = $prenom;
				$_SESSION['header'] = '<style>.liconnexion, .liinscription{position: absolute; z-index: -10; left: 2000px; opacity: 0;} .liprofil{position: relative; z-index: 1; opacity: 1;}</style>';
				$table1 = $bdd->prepare('INSERT INTO utilisateurs(login, prenom, nom, password) VALUES ("'.$_SESSION['login'].'","'.$prenom.'","'.$nom.'","'.$password.'")');
				$table1->execute();
				header('location: profil.php');
			}
			else{
				$_SESSION['message'] = 'Login non disponible';
				header('refresh: 0');
			}
		}
		else{
			$_SESSION['message'] = 'Les mots de passe doivent être identiques';
			header('refresh: 0');
		}
	}
?>