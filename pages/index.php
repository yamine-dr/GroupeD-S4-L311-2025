
<section class="banner style1 orient-left content-align-left image-position-right fullscreen onload-image-fade-in onload-content-fade-right">
	<div class="content">
		<h1>Mon [ blog ].</h1>
		<p class="major">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam consectetur porta tellus, quis auctor ante pulvinar non. Quisque aliquet lacus posuere purus vestibulum, eget rutrum turpis scelerisque.</p>
		<ul class="actions stacked">
			<li><a href="#first" class="button big wide smooth-scroll-middle">Consulter mes articles</a></li>
		</ul>
	</div>
	<div class="image">
		<img src="images/banner.jpg" alt="" />
	</div>
</section>

<?php 
	if (!function_exists('getArticlesFromJson')) {
		header('Location: ../index.php');
		exit();
	}
	// Récupération des articles depuis le fichier JSON
	$_articles = getArticlesFromJson();
	//var_dump($_articles);

	// Vérification qu'il y a des articles à afficher
	if($_articles && count($_articles)){
		$compteur = 1;
		// Boucle sur chaque article
		foreach($_articles as $article){
			$classCss = ($compteur % 2 == 0 ? 'left' : 'right');
			$compteur++; // Incrémentation du compteur pour l'article suivant
			?>
				<section class="spotlight style1 orient-<?php echo $classCss;?>  content-align-left image-position-center onscroll-image-fade-in" id="article-<?php echo $article['id'];?>">
					<div class="content">
						<h2><?php echo $article['titre'];?></h2>  <!-- Affichage du titre -->
						<p><?php echo $article['texte'];?></p> <!-- Affichage du contenu texte -->
						<ul class="actions stacked">
							<li><a href="?page=article&id=<?php echo $article['id'];?>" class="button">Lire la suite</a></li><!-- Lien vers la page de détail de l'article -->
						</ul>
					</div>
					<div class="image">
						<img src="<?php echo $article['image'];?>" alt="" />
					</div>
				</section>

			<?php
		}
	}
?>