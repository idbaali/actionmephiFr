<?php
// $title = "Esapce d'administration du site";
// require_once 'function/login.func.php';
// require_once 'header.php'; 
if(!isset($_SESSION['email'])){
    header('Location:/admin/login');
}?>

<div class="container form-modif"><h2 class="text-primary">Modifier nos valeurs!</h2><hr></div>
<div class="container">
    <!-- <div class="row  text-center">
        <div class="col-12 col-md-4">
            <h5>Équité</h5>
            <form action="" method="POST">
                <div class="form-outline">
                    <textarea class="form-control" name="description" id="textAreaExample" rows="4">bonjour</textarea>
                    <label class="form-label" for="textAreaExample">Description</label>
                </div><br>
                <div class="row">
                    <div class="col-12 col-md-6">
                        <button type="submit" name="btn_equite" class="btn btn-primary btn-sm btn-block">Mettre à jour</button>
                    </div>
                    <div class="col-12 col-md-6">
                        <a href="/admin/modification" class="btn btn-dark btn-sm btn-block">Annuler</a>
                    </div>
                </div>
            </form>
        </div>
        <div class="col-12 col-md-4">
            <h5>Partage</h5>
            <form action="" method="POST">
                <div class="form-outline">
                    <textarea class="form-control" name="description" id="textAreaExample" rows="4">bonjour</textarea>
                    <label class="form-label" for="textAreaExample">Description</label>
                </div><br>
                <div class="row">
                    <div class="col-12 col-md-6">
                        <button type="submit" name="btn_partage" class="btn btn-primary btn-sm btn-block">Mettre à jour</button>
                    </div>
                    <div class="col-12 col-md-6">
                        <a href="/admin/modification" class="btn btn-dark btn-sm btn-block">Annuler</a>
                    </div>
                </div>
            </form>
        </div>
        <div class="col-12 col-md-4">
            <h5>Passionnément Humain</h5>
            <form action="" method="POST">
                <div class="form-outline">
                    <textarea class="form-control" name="description" id="textAreaExample" rows="4">bonjour</textarea>
                    <label class="form-label" for="textAreaExample">Description</label>
                </div><br>
                <div class="row">
                    <div class="col-12 col-md-6">
                        <button type="submit" name="btn_equite" class="btn btn-primary btn-sm btn-block">Mettre à jour</button>
                    </div>
                    <div class="col-12 col-md-6">
                        <a href="/admin/modification" class="btn btn-dark btn-sm btn-block">Annuler</a>
                    </div>
                </div>
            </form>
        </div>
    </div> -->
    
    <div class="row">
        <div class="col-12 col-md-4">
            <div class="btn btn-primary btn-block mb-2" id="equite">Modifier Equité</div>
            <div class="btn btn-primary btn-block mb-2" id="partage">Modifier Partage</div>
            <div class="btn btn-primary btn-block mb-2" id="passio">Modifier Passionnement Humain</div>
        </div>
        <div class="col-12 col-md-8">
            <div class="equite">
                <?php $equite = valeur_equite(); ?>
                <h5>Équité</h5>
                <?php
                    if(isset($_POST['btn_equite'])){
                        $nom="Équité";
                        $description = htmlspecialchars(trim($_POST['description']));
                        $public = isset($_POST['public'])?'1' :'0';
                        $success = update_valeur($description, $public, $nom);
                        if($success){
                            echo '<div class="alert alert-success"><strong>Félicitations !</strong> Mise à jour éffectuée avec succès</div>';
                        }else{
                            echo '<div class="alert alert-danger"><strong>Echec !</strong> Mise à jour  échouée</div>';
                        }
                    }
                ?>
                <form action="" method="POST">
                    <div class="form-outline">
                        <textarea class="form-control" name="description" id="textAreaExample" rows="4"><?=$equite->description?></textarea>
                        <label class="form-label" for="textAreaExample">Description</label>
                    </div>
                    <!-- Default checkbox -->
                    <div class="form-check mt-1">
                        <input
                            class="form-check-input"
                            type="checkbox"
                            value=""
                            id="flexCheckDefault" name="public"
                        />
                        <label class="form-check-label" for="flexCheckDefault">
                            Public/privé
                        </label>
                    </div><br>
                    <div class="row">
                        <div class="col-12 col-md-6">
                            <button type="submit" name="btn_equite" class="btn btn-primary btn-sm btn-block">Mettre à jour</button>
                        </div>
                        <div class="col-12 col-md-6">
                            <a href="/admin/modification" class="btn btn-dark btn-sm btn-block">Annuler</a>
                        </div>
                    </div>
                </form>
            </div>
            <div class="partage">
                <?php $partage = valeur_partage(); ?>
                <h5>Partage</h5>
                <?php
                    if(isset($_POST['btn_partage'])){
                        $nom="Partage";
                        $description = htmlspecialchars(trim($_POST['description']));
                        $public = isset($_POST['public'])?'1' :'0';
                        $success = update_valeur($description, $public, $nom);
                        if($success){
                            echo '<div class="alert alert-success"><strong>Félicitations !</strong> Mise à jour éffectuée avec succès</div>';
                        }else{
                            echo '<div class="alert alert-danger"><strong>Echec !</strong> Mise à jour  échouée</div>';
                        }
                    }
                ?>
                <form action="" method="POST">
                    <div class="form-outline">
                        <textarea class="form-control" name="description" id="textAreaExample" rows="4"><?=$partage->description?></textarea>
                        <label class="form-label" for="textAreaExample">Description</label>
                    </div>
                    <!-- Default checkbox -->
                    <div class="form-check mt-1">
                        <input
                            class="form-check-input"
                            type="checkbox"
                            value=""
                            id="flexCheckDefault" name="public"
                        />
                        <label class="form-check-label" for="flexCheckDefault">
                            Public/Privé
                        </label>
                    </div><br>
                    <div class="row">
                        <div class="col-12 col-md-6">
                            <button type="submit" name="btn_partage" class="btn btn-primary btn-sm btn-block">Mettre à jour</button>
                        </div>
                        <div class="col-12 col-md-6">
                            <a href="/admin/modification" class="btn btn-dark btn-sm btn-block">Annuler</a>
                        </div>
                    </div>
                </form>
            </div>
            <div class="passionnement">
                <?php $passio = valeur_humain(); ?>
                <h5>Passionnément Humain</h5>
                <?php
                    if(isset($_POST['btn_passio'])){
                        $nom="Passionnément Humain";
                        $description = htmlspecialchars(trim($_POST['description']));
                        $public = isset($_POST['public'])?'1' :'0';
                        $success = update_valeur($description, $public, $nom);
                        if($success){
                            echo '<div class="alert alert-success"><strong>Félicitations !</strong> Mise à jour éffectuée avec succès</div>';
                        }else{
                            echo '<div class="alert alert-danger"><strong>Echec !</strong> Mise à jour  échouée</div>';
                        }
                    }
                ?>
                <form action="" method="POST">
                    <div class="form-outline">
                        <textarea class="form-control" name="description" id="textAreaExample" rows="4"><?=$passio->description?></textarea>
                        <label class="form-label" for="textAreaExample">Description</label>
                    </div>
                    <!-- Default checkbox -->
                    <div class="form-check mt-1">
                        <input
                            class="form-check-input"
                            type="checkbox"
                            value=""
                            id="flexCheckDefault" name="public"
                        />
                        <label class="form-check-label" for="flexCheckDefault">
                            Public/privé
                        </label>
                    </div><br>
                    <div class="row">
                        <div class="col-12 col-md-6">
                            <button type="submit" name="btn_passio" class="btn btn-primary btn-sm btn-block">Mettre à jour</button>
                        </div>
                        <div class="col-12 col-md-6">
                            <a href="/admin/modification" class="btn btn-dark btn-sm btn-block">Annuler</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>