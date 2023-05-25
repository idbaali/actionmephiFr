<?php
/**
 * function pour la section actualites
 */
if(!function_exists('actualite')){
    function actualite(){
        global $connexion;
        $sql = $connexion->query("SELECT * FROM gallery WHERE categorie = 'actualites' ORDER BY id DESC");
        $res = $sql->fetchobject();
        return $res;
    }
}
/**
 * function pour la section action mephi en images
 */
if(!function_exists('gallery')){
    function gallery(){
        global $connexion;
        $sql = $connexion->query("SELECT * FROM gallery WHERE categorie = 'gallery' ORDER BY id DESC LIMIT 0,10 ");
        $res = $sql->fetchAll(PDO::FETCH_OBJ);
        return $res;
    }
}
/**
 * function pour la section action mephi en images page Accueil
 */
if(!function_exists('gallery_home')){
    function gallery_home(){
        global $connexion;
        $sql = $connexion->query("SELECT * FROM gallery WHERE categorie = 'gallery' ORDER BY id DESC LIMIT 0,4 ");
        $res = $sql->fetchAll(PDO::FETCH_OBJ);
        return $res;
    }
}