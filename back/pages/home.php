
<?php
//require_once 'connection.php';
//require_once 'header.php';
?>
<!--################# code pour Photos profil ######## -->
<?php
if(isset($_POST['submitProfil'])){
    $photo = $_FILES['fichierProfil']['name'];
    $errors = [];
    if(empty($photo)){
        $errors['empty'] = 'sélectionner une photo de profil svp';
    }
    if(!empty($errors)){
        foreach($errors as $error){
        ?>
        <div class="container alert alert-danger"><?=$error?></div>
        <?php
        }
    }else{
        
        $photo = $_FILES['fichierProfil']['name'];
        $size1 = $_FILES['fichierProfil']['size'];
        $tmp1 = $_FILES['fichierProfil']['tmp_name'];
        $typefi1 = $_FILES['fichierProfil']['type'];
        $error1 = $_FILES['fichierProfil']['error'];
        $extensions1 = ['.png','.jpg','.jpeg','.gif','.PNG','.JPG','.JPEG','.GIF'];
        $extens1 = strchr($photo,'.');
        //destination
        $destination = "../images/".$photo;
         //verifier si c'est le bon extension
         if(!in_array($extens1,$extensions1)){
            $erreurs['type'] = "Le type du fichier n'est pas autorisé, vérifier";
        }else{
            $erreurs = [];
            if($error1 == 0){
                if($size1 < 2000000){
                    $m = move_uploaded_file($tmp1,$destination);
                    if($m){
                        $sql1 = ("INSERT INTO photos(image) VALUES (?)");
                        $rq= $connexion->prepare($sql1);
                        $res = $rq->execute(array($photo));
                        //modifier profil en un(1)
                        $id = $connexion->lastinsertId();
                        $ar = [
                            'id'   => $id,
                            'profil'=> '1'
                        ];
                        $mdf = ("UPDATE photos set profil =:profil WHERE id=:id");
                        $rt = $connexion->prepare($mdf);
                        $rt->execute($ar);
                        $erreurs['success'] = "le profil est très bien enregistrer.Merci";
                    }

                }else{
                    $erreurs['tail'] = "la taille du fichier est trop grande";
                }
            }else{
                $erreurs['err'] ="Erreur de téléchargement, désolé"; 
            }
        }
        if(!empty($erreurs)){
            foreach($erreurs as $erreur){
           ?>
            <div class="container alert alert-danger"><?=$erreur?></div>
           <?php
             }
         }
    }
}
?>
<div class="container card mb-3 mt-2">
    <div class="row">
        <div class="col-md-6 bg-info rounded">
                <h2 class="mt-2 text-light">Changer photo de profil</h2><hr>
                <form action="" method="POST" enctype="multipart/form-data">
                    <div class="form-group">
                        <input type="file" name="fichierProfil">
                        <button class="btn btn-danger rounded" name="submitProfil" type="submit">Envoyer</button>
                    </div>
                </form>
        </div>
        <div class="col-md-6 bg-danger rounded">
            <h2 class="mt-2 text-light">Changer photo de A propos</h2><small><i class="fas fa-signal mr-2"></i>Attention, ici la photo doit etre en (.png)</small><hr>
                <form action="" method="POST" enctype="multipart/form-data">
                    <div class="form-group">
                        <input type="file" name="fichierProfil">
                        <button class="btn btn-info rounded" name="submitProfil" type="submit">Envoyer</button>
                    </div>
                </form>
        </div>
    </div>
</div>

<!--################# code pour Photos mise à jour photos ######## -->
<?php
 
if(isset($_POST['submitPhoto'])){
 $nomfichier = htmlspecialchars(trim($_POST['nomPhoto']));
 $descrip = htmlspecialchars(trim($_POST['descrip']));
 $errors = [];
    if(empty($nomfichier) || empty($descrip) || empty($_FILES['fichier']['name'])){
            $errors['empty'] = "veuillez remplir tous les champs svp";
    }

    if(!empty($errors)){
        foreach ($errors as $error) {
            ?>
            <div class="container">
                <div class='row '>
                    <div class='col-md-6 alert alert-danger'><?=$error?></div>
                </div>
            </div>
             <?php
            
        }
    }else{
            $msg = [];
            $nomfi = $_FILES['fichier']['name'];
            $size = $_FILES['fichier']['size'];
            $tmp = $_FILES['fichier']['tmp_name'];
            $typefi = $_FILES['fichier']['type'];
            $error = $_FILES['fichier']['error'];
            $extensions = ['.png','.jpg','.jpeg','.gif','.PNG','.JPG','.JPEG','.GIF'];
            $extens = strchr($nomfi,'.');
            //nouveau nom
            $nouveauNom = $nomfichier.$extens;
            $destination = "../images/".$nouveauNom;
            //verifier si c'est le bon extension
            if(!in_array($extens,$extensions)){
                $msg['type'] = "Le type du fichier n'est pas autorisé, vérifier";
            }
            else if($error === 0){
                    if($size < 2000000){
                        $move = move_uploaded_file($tmp,$destination);
                        if($move){
                            
                            $sql = ("INSERT INTO photos(image,description) VALUES (?, ?)");
                            $req= $connexion->prepare($sql);
                            $resul = $req->execute(array($nouveauNom,$descrip));
                            $msg['success'] = "le fichier est très bien enregistrer.Merci";
                        }
                    }else{
                        $msg['taille'] = "la taille du fichier est trop grande, vérifier ou compresser la";
                    }
    
             }else{
                $msg['erreur'] = "Erreur de télechargement, Rassayer";
                }
    
        }
        //test erreurs traitement images
        if(!empty($msg)){
            foreach ($msg as $ms) {
                ?>
                <div class="container">
                    <div class='row '>
                        <div class='col-md-6 alert alert-danger'><?=$ms?></div>
                    </div>
                </div>
                 <?php
                
            }
        }    
    }
    
?>
<!--################# code pour Parcours ######## -->
<?php
 if(isset($_POST['submitParcour'])){
     $titrep = htmlspecialchars(trim($_POST['nomtitre']));
     $date_deb = htmlspecialchars(trim($_POST['datedeb']));
     $date_fin = htmlspecialchars(trim($_POST['datefin']));
     $messageText = htmlspecialchars(trim($_POST['messageText']));
     //definir les variables du fichier
     $fichierPar = $_FILES['fichierParc']['name'];
     $fichierParType = $_FILES['fichierParc']['type'];
     $fichierParTmp = $_FILES['fichierParc']['tmp_name'];
     $fichierParSize = $_FILES['fichierParc']['size'];
     $fichierParErr = $_FILES['fichierParc']['error'];
     $dest ="../images/".$fichierPar;
     $faux = [];
     $exts = ['.png','.jpg','.jpeg','.gif','.PNG','.JPG','.JPEG','.GIF'];
     $ext = strchr($fichierPar, '.');
     
     if(empty($titrep) || empty($date_deb) || empty($date_fin) || empty($messageText) || empty($fichierPar)){
         $faux['empty'] = "Veuillez remplir tous les champs, merci"; 
     }


     else if(!in_array($ext,$exts)){
        $faux['extension'] = "Erreur, l'extension du fichier n'est pas autorisé";
     }
     else if($fichierParErr != 0){
        $faux['erreur'] = "Erreur, le fichier n'est pas chargée. Reessayer";
     }
    else if($fichierParSize > 2000000){
        $faux['size'] = "Erreur, la taille du fichier ".$fichierPar ." est trop grande, désolé";
     }

     //on affiche les erreurs
     if(!empty($faux)){
         foreach ($faux as $fau) { ?>
         <div class="container">
             <div class="row">
                 <div class="col-md-6 offset-6">
                    <div class="alert alert-danger"><?=$fau?></div>
                    
                 </div>
             </div>
         </div>
            <?php
         }  
     }else{
        $depl = move_uploaded_file($fichierParTmp,$dest);
        if($depl){
            $sl = "INSERT INTO parcours (titre,image,date_deb,date_fin,description) VALUES (?,?,?,?,?)";
            $r = $connexion->prepare($sl);
            $conf = $r->execute(array($titrep,$fichierPar,$date_deb,$date_fin,$messageText)); 
            if(isset($conf)){
                ?>
                <div class="container">
                    <div class="row">
                        <div class="col-md-6 offset-6">
                            <div class="alert alert-success">Très bien , Enregistrement de données reussi.</div>
                        </div>
                    </div>
                </div>
                
                <?php
            }
        }
     }




 }
?>
<article class="container"> 
<div class="row">
        <div class="col-md-6 card">
            <h2 class="mt-2 text-dark">Mettre à jour Mes photos</h2><hr>
            <form action="" method="POST" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="nomPhoto">Inserer le nouveau nom de l'image</label>
                    <input type="text" class="form-control" id="nomPhoto" name="nomPhoto"><br>
                    <label for="nomPhoto">La description de l'image</label>
                    <textarea name="descrip" id="" cols="" rows="3" class="form-control"></textarea><br>
                    <input type="file" name="fichier" class="form-control">
                    <button class="btn btn-primary rounded" name="submitPhoto" type="submit">Envoyer</button>
                </div>
            </form>
        </div>
        <div class="col-md-6">
            <h2 class="mt-2 text-dark">Mettre à jour Mon Parcours</h2><hr>
            <form action="" method="POST" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="nomtitre">Inserer le titre</label>
                    <input type="text" class="form-control" id="nomtitre" name="nomtitre"><br>
                    <div class="row">
                        <div class="col-md-6">
                            <label for="datedeb">Inserer la date du début</label>
                            <input type="date" class="form-control" id="datedeb" name="datedeb"><br>
                        </div>
                        <div class="col-md-6">
                            <label for="datefin">Inserer la date du fin</label>
                            <input type="date" class="form-control" id="datefin" name="datefin"><br>
                        </div>
                    </div>
                    <label for="messageText">Inserer la déscription du parcours</label>
                    <textarea class="form-control" name="messageText" id="messageText" cols="10" rows="3"></textarea><br>
                    
                    <input type="file" name="fichierParc" class="form-control">
                    <button class="btn btn-primary rounded" name="submitParcour" type="submit">Envoyer</button>
                </div>
            </form>
        </div>
    </div>
</article>




