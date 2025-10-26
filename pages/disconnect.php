<?php
	setDisconnectUser();

	header('Location:indx.php');
?>

<?php
// Début du bloc try-catch pour la gestion des erreurs
try {
    // Vérification que la fonction de déconnexion existe
    if (!function_exists('setDisconnectUser')) {
        throw new Exception("Erreur : fonctions de déconnexion non disponibles");
    }
    
    // Journalisation de la tentative de déconnexion
    error_log("Tentative de déconnexion utilisateur");
    
    // Appel de la fonction de déconnexion
    setDisconnectUser();
    
    // Journalisation de la réussite de la déconnexion
    error_log("Déconnexion réussie");
    
    // Redirection vers la page d'accueil après déconnexion
    header('Location: ../index.php');
    exit();  // Arrêt de l'exécution du script
    
} catch (Exception $e) {
    // Gestion des erreurs - journalisation du problème
    error_log("ERREUR déconnexion : " . $e->getMessage());
    
    // Redirection de secours vers l'accueil même en cas d'erreur
    header('Location: ../index.php');
    exit();  // Arrêt de l'exécution du script
}
?>