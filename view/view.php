<!DOCTYPE html>
<html lang="fr">
<head>

	<!--Hors de page-->
	<link rel="icon" href="Images/logo.ico" />
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="./styles.css">
	<title><?php echo $pagetitle; ?></title>		<!--Titre affiché sur l'onglet-->



</head>

<!--Corps de page (propre à chaque page)-->

<!--Pour l'en-tête de page-->
<header>
	<nav> <!--Menu-->
		<div class=menu_burger>
			<a> <img class = "responsive-img" src="./Images/logo.png " alt="Erreur d'affichage d'image" id="logobg"></a>
			<div class="sous_menu_burger">
				<div><a class=ctg_menu_burger href="index.php">Accueil</a></div>
				<br>
				<div><a class=ctg_menu_burger href="index.php?action=readAll&controller=produit">Produits</a></div>
				<div><a class=ctg_menu_burger href="index.php?action=show_panier&controller=utilisateur1">Panier</a></div>
				<?php
				if(Session::is_admin()) {
					echo '<div><a class=ctg_menu_burger href="index.php?action=readAll&controller=utilisateur1">Utilisateurs</a></div>
					<div><a class=ctg_menu_burger href="index.php?action=readAll&controller=commande">Historique des commandes</a></div>';
				}
				else if (isset($_SESSION['loginUtilisateur'])){
					echo '<div><a class=ctg_menu_burger href="index.php?action=read&controller=utilisateur1&loginUtilisateur='.$_SESSION['loginUtilisateur'].'">Mon Compte</a></div>
					<div><a class=ctg_menu_burger href="index.php?action=readAll&controller=commande">Historique des commandes</a></div>';
				}

				if(isset($_SESSION['loginUtilisateur'])) {
					echo ('<div><a class=ctg_menu_burger href="index.php?controller=utilisateur1&action=deconnect">Se déconnecter</a></div>');
				}
				else {
					echo ('<div><a class=ctg_menu_burger href="index.php?action=create&controller=utilisateur1">S\'inscrire</a></div>
						<div><a class=ctg_menu_burger href="index.php?action=connect&controller=utilisateur1">Se connecter</a></div>');
				}
				?>
			</div>
		</div>


		<div class=menu>
			<a href="index.php"><img src="./Images/logo.png" alt="Erreur d'affichage d'image" id="logo"></a>
			<?php
			if(Session::is_admin()) {
				echo '<div class=titre_section><a class=ctg_nav_admin >Mode Admin</a></div>';
			}
			?>
			<div class=titre_section><a class=ctg_nav href="index.php?action=readAll&controller=produit">Produits</a></div>
			<div class=titre_section><a class=ctg_nav href="index.php?action=show_panier&controller=utilisateur1">Panier</a></div>
			<?php


			if(Session::is_admin()) {

				echo '<div class=titre_section><a class=ctg_nav href="index.php?action=readAll&controller=utilisateur1">Gestion utilisateurs</a></div>';

			}

			if(isset($_SESSION['loginUtilisateur'])){
				echo '<div class=titre_section><a class=ctg_nav href="index.php?action=read&controller=utilisateur1&loginUtilisateur='.$_SESSION['loginUtilisateur'].'">Mon Compte</a></div>
				<div class=titre_section><a class=ctg_nav href="index.php?action=readAll&controller=commande">Historique des commandes</a></div>';
				
				echo ('<div class=titre_section><a class=ctg_nav href="index.php?controller=utilisateur1&action=deconnect">Se déconnecter</a></div>');
			}else {
				echo ('<div class=titre_section><a class=ctg_nav href="index.php?action=create&controller=utilisateur1">S\'inscrire</a></div>
					<div class=titre_section><a class=ctg_nav href="index.php?action=connect&controller=utilisateur1">Se connecter</a></div>');
			}
			?>
			<form class ="search" method="GET">
				<input type="hidden" name="action" value="search"/>
				<input type="search" name="data" placeholder="Recherche..."/>
				<input class=bouton_recherche type="submit" value="Valider" />
			</form>
		</div>

	</nav>
</header>

<main>


	<?php
			// Si $controleur='voiture' et $view='list',
			// alors $filepath="/chemin_du_site/view/voiture/list.php"
	$filepath = File::build_path(array("view", self::$object, "$view.php"));
	require $filepath;
	?>
</main>

<footer>
	<div class="FootBot">
		<div class="footerSocialIcons">
			<h4 class="">Suivez nous</h4>
			<div class="social-icons">
				<a href="https://www.instagram.com/?hl=fr" class="social-icon"> <img class="icon" src="./Images/insta.png" alt="ca marche pas"></a>
				<a href="https://fr-fr.facebook.com/" class="social-icon"> <img class="icon" src="./Images/fb.png" alt="ca marche pas"></a>
				<a href="https://www.twitter.com/" class="social-icon"> <img class="icon" src="./Images/twitter.png" alt="ca marche pas"></a>
			</div>
		</div>
	</div>
</footer> 
</html>



