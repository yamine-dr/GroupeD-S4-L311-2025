<?php
    session_start();

    define('TL_ROOT', dirname(__DIR__));
    define('LOGIN', 'UEL311');
    define('PASSWORD', 'U31311');
    define('DB_ARTICLES', TL_ROOT.'/db/articles.json'); // reparation du chemin changement de dbal en db 

    function connectUser($login = null, $password = null){
        if(!is_null($login) && !is_null($password)){
            if($login === LOGIN && $password === PASSWORD){
                return array(
                    'login'    => LOGIN,
                    'password' => PASSWORD
                );
            }
        }
        return null;
    }

    function setDisconnectUser(){
         unset($_SESSION['User']);
         session_destroy();
    }

    function isConnected(){
        if(array_key_exists('User', $_SESSION) 
                && !is_null($_SESSION['User'])
                    && !empty($_SESSION['User'])){
            return true;
        }
        return false;
    }

    function getPageTemplate($page = null){
        $fichier = TL_ROOT.'/pages/'.(is_null($page) ? 'index.php' : $page.'.php');

        if(!file_exists($fichier)){
            include_once TL_ROOT.'/pages/index.php';
            // il manquer ici le "u" a la fonction include
        }else{
            include_once $fichier;
        }
    }

    function getArticlesFromJson()
    {
        if (!file_exists(DB_ARTICLES)) {
            error_log("Erreur : le fichier " . DB_ARTICLES . " est introuvable.", 0);
            return null;
        }

        $contenu_json = file_get_contents(DB_ARTICLES);
        $articles = json_decode($contenu_json, true);

        if ($articles === null) {
            error_log("Erreur : échec du décodage JSON dans " . DB_ARTICLES, 0);
            return null;
        }

        return $articles;
    }


function getArticleById($id_article = null){ // on a essaye ici de faire un == au lieu d'un = afin d'affecter une valeur par defaut a id_article
       if(file_exists(DB_ARTICLES)) {
            $contenu_json = file_get_contents(DB_ARTICLES);
            $_articles    = json_decode($contenu_json, true);

            foreach($_articles as $article){
                if($article['id'] == $id_article){
                    return $article;
                }
            }
        }

        return null;
    }
