<?php 
	$message = null;
	// Si un formulaire a été envoyé en POST, on vérifie les données
	if($_SERVER["REQUEST_METHOD"] == "POST"){
		if(array_key_exists('login', $_POST) && array_key_exists('password', $_POST)){
			if(!empty($_POST['login']) && !empty($_POST['password'])){
				// Si elles ne sont pas vides, connexion de l'utilisateur
				$_SESSION['User'] = connectUser($_POST['login'], $_POST['password']);
				if(!is_null($_SESSION['User'])){
					// Si la connexion est réussie, on redirige vers la page d'accueil
					header("Location:index.php");
				}else{
						// Sinon, on affiche un message d'erreur (affiché à la ligne 30)
	    			$message = "Mauvais login ou mot de passe";
	    		}
	    	}
	    }
	}	
?>

<section class="wrapper style1 align-center">
	<div class="inner">
		<div class="index align-left">
			<section>
				<header>
					<h3>Se connecter</h3>
					<a href="index.php" class="button big wide smooth-scroll-middle">Revenir à l'accueil</a></li>
				</header>
				<div class="content">
					<?php echo (!is_null($message) ? "<p>".$message."</p>" : '');?>
					<!-- formulaire de connexion -->
					<form method="post" action="#">
						<div class="fields">
							<!-- champ "login" -->
							<div class="field half">
								<label for="login">Nom d'utilisateur</label>
								<input type="text" name="login" id="login" value="" />
							</div>
							<!-- champ "password" -->
							<div class="field half">
								<label for="password">Mot de passe</label>
								<input type="password" name="password" id="password" value="" />
							</div>
						</div>
						<ul class="actions">
							<!-- bouton "Se connecter" -->
							<li><input type="submit" name="submit" id="submit" value="Se connecter" /></li>
						</ul>
					</form>
				</div>
			</section>
		</div>
	</div>
</section>