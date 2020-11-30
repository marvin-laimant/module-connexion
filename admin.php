<html lang="fr">
	<head>
		<meta name="viewport" content="width=device-width">
		<link rel="stylesheet" href="CSS/index.css">
		<meta charset="UTF-8">
		<title>Module Connexion</title>
	</head>
	<body>
		<?php include 'mainheader.php' ?>
		<main class="main_admin">
			<table>
				<thead>
					<tr>
						<th>Login</th>
						<th>Prénom</th>
						<th>Nom</th>
						<th>Mot de passe</th>
					</tr>
				</thead>
				<tbody>
					<?php
						$table = $bdd->query('SELECT * FROM utilisateurs');
						
						while($ligne = $table->fetch_assoc()){
							echo '<tr><td>'.$ligne['login'].'</td>';
							echo '<td>'.$ligne['prenom'].'</td>';
							echo '<td>'.$ligne['nom'].'</td>';
							echo '<td>'.$ligne['password'].'</td></tr>';
						}
					?>
				</tbody>
			</table>
		</main>
		<?php include 'mainfooter.php' ?>
	</body>
</html>