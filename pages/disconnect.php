<?php
// Début du bloc try-catch pour la gestion des erreurs
try {
    // Vérification que la fonction de déconnexion existe
    if (!function_exists('setDisconnectUser')) {
        throw new Exception("Erreur : fonctions de déconnexion non disponibles");
    }
    
    // Appel de la fonction de déconnexion
    setDisconnectUser();
    
    // Redirection vers VOTRE page d'accueil
    header('Location: index.php');
    exit();
    
} catch (Exception $e) {
    // Gestion des erreurs - journalisation du problème
    error_log("ERREUR déconnexion : " . $e->getMessage());
    
    // Redirection de secours vers VOTRE accueil
    header('Location: index.php');
    exit();
}
?>