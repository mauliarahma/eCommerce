<h1>Gestion des utilisateurs (Mode Admin)</h1>
<p>Voici la liste des utilisateurs, cliquez sur un login pour le modifier</p>

<?php
    foreach ($tab_u as $u) 
        echo ('<p>L\'utilisateur <a href="index.php?controller=utilisateur1&action=read&loginUtilisateur='.rawurlencode($u->get('loginUtilisateur')).'">'.htmlspecialchars($u->get('loginUtilisateur')).'</a></p>');
    
?>
<a href="index.php?controller=utilisateur1&action=create" class="bouton">+ Ajouter un utilisateur</a>
