<?php
// $title = "Esapce d'administration du site";
// require_once 'function/login.func.php';
// require_once 'header.php'; 
/*if(!isset($_SESSION['admin'])){
    header('Location:/admin/login');
}
*/
?>

<div class="row p-5 mt-5">
    <div class="col-md-8 offset-2">
        <?php
           
            if(isset($_POST['submit'])){
                $password1 = htmlspecialchars(trim($_POST['password1']));
                $password2 = htmlspecialchars(trim($_POST['password2']));
                $email = htmlspecialchars(trim($_POST['email']));
                //$errors = [];
                $tab = [
                    'email'  =>$email,
                    'email_session'  =>$_SESSION['admin']
                ];
                $sql = "SELECT * FROM admin WHERE (email=:email) OR (email=:email_session)";
                $req = $connexion->prepare($sql);
                $req->execute($tab);
                $rest = $req->rowCount();

                if(!$rest){
                    $_SESSION['alert'] = "cet email n'existe pas merci de vérifier svp";
                    $_SESSION['alert_code'] = "error";
                }
                elseif(empty($password1) || empty($password2)){
                    ?>
                    <div class="alert alert-danger">Veuillez remplir tous les champs svp</div>
                    <?php    
                }
                elseif($password1 != $password2){
                    ?>
                    <div class="alert alert-danger">Les deux mot de passe ne sont pas identiques, vérifier svp</div>
                    <?php
                }
                else{
                    //rediger l'enregistrement, sans oublier verifier l'extension du fichier
                    upload_pass($password1, $email);
                    ?>
                    <div class="alert alert-success">Mot de passe modifié avec succès. Bravo!</div>
                    <?php 
                }
            }

        ?>
        <form action="" method="POST" enctype="multipart/form-data" class="">
            <div class="card">
                <div class="row no-gutters">
                
                    <div class="col-md-5 col-12 col-sm-5 col-lg-5 bg-danger">
                        <i class="fas fa-key d-flex justify-content-center align-items-center fa-10x mt-5 text-light"></i>
                    
                    </div>
                    <div class="col-md-7 col-12 col-sm-7 col-lg-7">
                        <div class="form-group  p-3   text-light">         
                            <h2 class="mt-2 mb-5 text-dark">Choisir Mon mot de passe</h2>
                            
                                <div class="mt-3">
                                    <?php if(!isset($_SESSION['admin'])): ?>
                                        
                                        <div>
                                            <input type="email"  class="form-control mt-2" name="email" placeholder="Taper votre email">
                                        </div>
                                    <?php endif; ?>       
                                    <div class="">
                                        <input type="password"  class="form-control mt-2" name="password1" placeholder="Taper votre mot de passe">
                                    </div>
                                    <div class="">
                                        <input type="password"  class="form-control mt-2" name="password2" placeholder="Rétaper votre mot de passe">
                                    </div>
                                </div>
                                <div class="row mt-4">
                                    <div class="col-12 col-md-6 col-12 col-sm-6 col-lg-6">
                                        <div class="d-grid gap-2">
                                            <button type="submit" name="submit" class="btn btn-primary mt-3 btn-block ">Valider</button>
                                        </div>
                                    </div> 
                                </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
    <div class="col-md-2"></div>
</div>



