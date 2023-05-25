<?php
//require_once 'main-function.php';

/** verifier si admin existe */
function is_login($email,$password){
    global $connexion;
    $array = [
        'email'    =>$email,
        'password' =>sha1($password)
    ];


    $sql =("SELECT * FROM admin WHERE email = :email AND password = :password ");
    $req = $connexion->prepare($sql);
    $req->execute($array);
    $result = $req->fetchAll(PDO::FETCH_OBJ);
    $exist = $req->rowCount();

    return $exist;
}

/** recuperer les infos de pour la session Admin */
function is_connected($email,$password){
    global $connexion;
    $array = [
        'email'    =>$email,
        'password' =>sha1($password)
    ];


    $sql =("SELECT * FROM admin WHERE email = :email AND password = :password ");
    $req = $connexion->prepare($sql);
    $req->execute($array);
    $result = $req->fetchobject();
    return $result;
}

/**function pour envoyer le fichier et update mot de passe dans la base */

if(!function_exists('send_file_admin')){
    function send_file_admin($password1,$photo){
        global $connexion;
        $array = [
            'password'  =>sha1($password1),
            'email'     =>$_SESSION['email'],
            'image'     =>$photo
        ];
        $sql = ("UPDATE admin SET password = :password, image= :image WHERE email= :email");
        $req = $connexion->prepare($sql);
        $success = $req->execute($array);
        return $success;
    }
}
/**
 * function pour envoyer des photos de la gallery
 */
if(!function_exists('send_gallery')){
    function send_gallery($titre, $description, $image, $categorie){
        global $connexion;
        $sql = "INSERT INTO gallery(titre,description,image,categorie) VALUES (?,?,?,?)";
        $req = $connexion->prepare($sql);
        $success = $req->execute(array($titre,$description, $image, $categorie));
        return $success;
    }
}
/**
 * function pour Modifier le mot de pass Admin
 */
function upload_pass($password1, $email){
    global $connexion;
    $tab = [
        'password'  =>sha1($password1),
        'email'     =>$_SESSION['admin']
    ];
    $sql = "UPDATE admin set password=:password WHERE email=:email";
    $req = $connexion->prepare($sql);
    $res = $req->execute($tab);
    return $res;
}

/**
 * function pour envoyer carroussel pour actualités/diapo
 */
if(!function_exists('send_carrou')){
    function send_carrou($nom,$image, $description){
        global $connexion;
        $sql = "INSERT INTO carrou(nom,image,description) VALUES (?,?,?)";
        $req = $connexion->prepare($sql);
        $success = $req->execute(array($nom,$image,$description));
        return $success;
    }
}

/**
 * function pour envoyer les valeurs du providence
 */
if(!function_exists('valeur')){
    function valeur($nom, $description,$statut){
        global $connexion;
        $sql = "INSERT INTO valeur(nom,description, statut) VALUES (?,?,?)";
        $req = $connexion->prepare($sql);
        $data = $req->execute(array($nom,$description, $statut));

        return $data;
    }
} 

/**
 * function pour temoignages
 */
if(!function_exists('temoignage')){
    function temoignage($nom, $nouveau_nom, $titre, $description, $pays, $drapeau){
        global $connexion;
        $sql = "INSERT INTO temoignage (nom,titre, image, pays, description, drapeau) VALUES (?,?,?,?,?,?)";
        $req = $connexion->prepare($sql);
        return $req->execute(array($nom,$titre, $nouveau_nom, $pays, $description, $drapeau));
    }
}

/**
 * function pour la valeur partage
 */
if(!function_exists('valeur_partage')){
    function valeur_partage(){
        global $connexion;
        $sql = $connexion->query("SELECT * FROM valeur WHERE nom = 'Partage' ORDER BY id DESC");
        $res = $sql->fetchobject();
        return $res;
    }
}
/**
 * function pour la valeur Équité
 */
if(!function_exists('valeur_equite')){
    function valeur_equite(){
        global $connexion;
        $sql = $connexion->query("SELECT * FROM valeur WHERE nom = 'Équité' ORDER BY id DESC");
        $res = $sql->fetchobject();
        return $res;
    }
}

/**
 * function pour la valeur Humain
 */
if(!function_exists('valeur_humain')){
    function valeur_humain(){
        global $connexion;
        $sql = $connexion->query("SELECT * FROM valeur WHERE nom = 'Passionnément Humain' ORDER BY id DESC");
        $res = $sql->fetchobject();
        return $res;
    }
}

/**
 * Mise à jour Mes valeurs
 */
if(!function_exists('update_valeur')){ 
    function update_valeur($description, $public, $nom){
        global $connexion;
        $tab= [
            'description' =>$description,
            'statut'      =>$public,
            'nom'         =>$nom
         ];
        $sql ="UPDATE valeur SET description= :description, statut= :statut  WHERE nom= :nom ";
        $req = $connexion->prepare($sql);
        return $req->execute($tab);
    }
}