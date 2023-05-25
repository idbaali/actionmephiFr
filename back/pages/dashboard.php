<?php
// $title = "Tableau d'administration du site";
// require_once 'function/main-function.php';
// require_once 'header.php'; 
if(!isset($_SESSION['admin'])){
    header('Location:/admin/login');
}
?>
<div class="container">
    <div class="row mt-5 ms-5 me-5 form-login">
        <div class="col-12 col-sm-12 col-lg-12 col-md-12 form-dash">
            
            <button class="btn btn-primary p-2 mt-2 btn-block"><h2>Gallery / Média / Actualités</h2></button>
            <div>
                <small class="text-danger">Ce panel vous permet d'envoyer des posts relatifs à la section Photos/gallery/Actualités du site</small><br>
                <?php
                if(isset($_POST['btn_gallery'])){
                    $titre = htmlspecialchars(trim($_POST['titre']));
                    $nom = htmlspecialchars(trim($_POST['nom']));
                    $categorie = htmlspecialchars(trim($_POST['categorie']));
                    $description = htmlspecialchars(trim($_POST['description']));
                    $fichier = $_FILES['fichier']['name'];
                    $fichiersize = $_FILES['fichier']['size'];
                    $fichiertmp = $_FILES['fichier']['tmp_name'];
                    $fichiererror = $_FILES['fichier']['error'];
                    $fichiertype = $_FILES['fichier']['type'];

                    /** checking si l'extension est bonne */
                    $extensions = ['.png','.PNG','.jpg','.JPG','.jpeg','.JPEG','.gif','.GIF'];
                    $ext = strchr($fichier, '.');
                    $image = $nom.$ext;
                    $destination = "img/gallery/".$image;

                    if(empty($titre) || empty($nom) || empty($fichier) || empty($description) || empty($categorie)){
                        ?>
                        <div class="alert alert-danger">vous devriez remplir tous les champs requis svp!</div>
                        <?php
                    }else if(!in_array($ext, $extensions)){
                        ?>
                        <div class="alert alert-danger">L'extension du fichier que vous  envoyez n'est pas autorisée dans le site</div>
                        <?php
                    }else if($fichiersize > 3000000){
                        ?>
                        <div class="alert alert-danger">La taille de votre fichier  est trop grand, Compressez-le si possible</div>
                        <?php

                    }else if($fichiererror != 0){
                        ?>
                        <div class="alert alert-danger">Echec lors de chargement du fichier dans le serveur, Réessayer!</div>
                        <?php
                    }else{
                        move_uploaded_file($fichiertmp, $destination);
                        $send_gallery = send_gallery($titre, $description, $image, $categorie);
                        if($send_gallery){
                            ?>
                            <div class="alert alert-success"><b>Félicitations ! Evagéliste Ike Baali D, </b>Votre fichier a été envoyé avec succès</div>
                            <?php
                        }else{
                            ?>
                            <div class="alert alert-danger"><b>Echec Evagéliste Ike Baali D<b>, Une erreur s'est produit lors de l'envoie du fichier</div>
                            <?php
                        }
                    }
                }
                ?>
                <form action="" method="POST" class="" enctype="multipart/form-data">
                    <select class="custom-select mb-2" id="inputGroupSelect01" name="categorie">
                        <option value="" selected >Choisir une catégorie</option>
                        <option value="actualites">Actualites Action Mephi</option>
                        <option value="gallery">Gallery</option>
                    </select><br>
                    <div class="form-outline">
                        <input type="text" id="form1" name="titre" class="form-control form-icon-trailing" />
                        <label class="form-label" for="form1">Titre</label>
                    </div><br>
                    <div class="form-outline">
                        <input type="text" id="form1" name="nom" class="form-control form-icon-trailing" />
                        <label class="form-label" for="form1">Nom Complet</label>
                    </div><br>
                    
                    <input class="form-control form-control-lg" name="fichier" id="formFileLg" type="file" />
                    <label for="formFileLg" class="form-label">Photo Gallery/Actualités</label><br>
                    <div class="form-outline">
                        <textarea class="form-control" name="description" id="textAreaExample" rows="4"></textarea>
                        <label class="form-label" for="textAreaExample">Description de l'image</label>
                    </div><br>
                    <button type="submit" name="btn_gallery" class="btn btn-primary btn-lg">Valider</button>
                </form>
            </div>
        </div>
    </div> 
    <hr>
    <div class="non-pay">
        <button class="btn btn-primary p-2 btn-actualites btn-block">
            <h2>A propos</h2>
        </button>
        <div class="actualites">
            <small class="text-danger">Ce panel vous permet d'envoyer des posts relatifs à la section nos Valeurs du site</small><br>
            <?php
                if(isset($_POST['btn_valeur'])){
                    die('En cours de maintenance, contacter l\'administrateur du site');
                    $nom = htmlspecialchars(trim($_POST['nom']));
                    $description = htmlspecialchars(trim($_POST['description']));
                    $public = isset($_POST['public'])?'1' :'0';

                    if(empty($nom)|| empty($description)){
                        ?>
                        <div class="alert alert-danger">vous devriez remplir tous les champs requis svp!</div>
                        <?php
                    }else{
                        $success = valeur($nom, $description, $public);
                        if($success){
                            ?>
                        <div class="alert alert-success"><b>Félicitations !</b> vos données sont enregistrées avec succès dans le système</div>
                        <?php
                        }else{
                            ?>
                        <div class="alert alert-danger">Echec lors de l'enregistrement dans la base de donnée!</div>
                        <?php
                        }
                    }
                }
            ?>
            <form action="" method="POST">
                <select class="custom-select" id="inputGroupSelect01" name="nom">
                    <option value="" selected >Choisir une valeur</option>
                    <option value="benevole">benevole</option>
                    <option value="soutenir">soutenir</option>
                    <option value="rejoindre">rejoindre</option>
                </select><br>
                <input class="form-control form-control-lg mt-2" name="fichier" id="formFileLg" type="file" />
                <label for="formFileLg" class="form-label">Image</label><br>
                <div class="form-outline mt-2">
                    <textarea class="form-control" name="description" id="textAreaExample" rows="4"></textarea>
                    <label class="form-label" for="textAreaExample">Description</label>
                </div><br>
                <!-- Default checkbox -->
                <div class="form-check">
                    <input
                        class="form-check-input"
                        type="checkbox"
                        value="" name="public"
                        id="flexCheckDefault"
                            />
                    <label class="form-check-label" for="flexCheckDefault">
                        Public/Privé
                    </label>
                </div><br>
                <button type="submit" name="btn_valeur" class="btn btn-primary btn-lg">Valider</button>
            </form>
        </div>  
        <hr>

        <button class="btn btn-primary p-2 btn-projet btn-block mb-2">
            <h2>Projet Action Mephi</h2>
        </button>        
        <div class="projet">
            <small class="text-danger">Ce panel vous permet d'envoyer des posts relatifs à la section nos Valeurs du site</small><br>
            <?php
            if(isset($_POST['btn_carrou'])){
                die('En cours de maintenance, contacter l\'administrateur du site');
                
                $nom = htmlspecialchars(trim($_POST['nom']));
                $description = htmlspecialchars(trim($_POST['description']));
                $fichier = $_FILES['fichier']['name'];
                $fichiersize = $_FILES['fichier']['size'];
                $fichiertmp = $_FILES['fichier']['tmp_name'];
                $fichiererror = $_FILES['fichier']['error'];
                $fichiertype = $_FILES['fichier']['type'];

                /** checking si l'extension est bonne */
                $extensions = ['.png','.PNG','.jpg','.JPG','.jpeg','.JPEG','.gif','.GIF'];
                $ext = strchr($fichier, '.');
                $nouveau_nom = $nom.$ext;
                $destination = "../img/carrou/".$nouveau_nom;

                if(empty($nom) || empty($fichier) || empty($description)){
                    ?>
                    <div class="alert alert-danger">vous devriez remplir tous les champs requis svp!</div>
                    <?php
                }else if(!in_array($ext, $extensions)){
                    ?>
                    <div class="alert alert-danger">L'extension du fichier que vous  envoyez n'est pas autorisée dans le site</div>
                    <?php
                }else if($fichiersize > 2000000){
                    ?>
                    <div class="alert alert-danger">La taille de votre fichier  est trop grand, Compressez-le si possible</div>
                    <?php

                }else if($fichiererror != 0){
                    ?>
                    <div class="alert alert-danger">Echec lors de chargement du fichier dans le serveur, Réessayer!</div>
                    <?php
                }else{
                    move_uploaded_file($fichiertmp, $destination);
                    $send_gallery = send_carrou($nom,$nouveau_nom, $description);
                    if($send_gallery){
                        ?>
                        <div class="alert alert-success"><b>Félicitations ! <?=$_SESSION['nom']?>, </b>Votre Evènement a été envoyé avec succès</div>
                        <?php
                    }else{
                        ?>
                        <div class="alert alert-danger"><b>Echec <?=$_SESSION['nom']?><b>, Une erreur s'est produit lors de l'envoie du fichier</div>
                        <?php
                    }
                }
            }
            ?>
            <form action="" method="POST" class="mb-3"  enctype="multipart/form-data">
                <div class="form-outline">
                    <input type="text" id="form1" name="nom" class="form-control form-icon-trailing" />
                    <label class="form-label" for="form1">Titre de l'évènement</label>
                </div><br>
                
                <input class="form-control form-control-lg" name="fichier" id="formFileLg" type="file" />
                <label for="formFileLg" class="form-label">Image</label><br>
                <div class="form-outline">
                    <textarea class="form-control" name="description" id="textAreaExample" rows="6"></textarea>
                    <label class="form-label" for="textAreaExample">Description de l'évènement</label>
                </div><br>
                <!-- Default checkbox -->
                <div class="form-check">
                    <input
                        class="form-check-input"
                        type="checkbox"
                        value="" name="public"
                        id="flexCheckDefault"
                            />
                    <label class="form-check-label" for="flexCheckDefault">
                        Public/Privé
                    </label>
                </div><br>
                <button type="submit" name="btn_carrou" class="btn btn-primary btn-lg">Valider</button>
            </form>
        </div>
    </div>   
</div>




