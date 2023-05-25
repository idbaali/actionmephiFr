<?php
//$title = "Esapce d'administration du site";
//require_once 'function/login.func.php';
//require_once 'header.php'; 
if (isset($_SESSION['admin'])) {
    header('Location:/admin/dashboard');
}
?>

<div class="row mt-5">
    <div class="col-md-8 offset-2 form-login">
        <?php
        if (isset($_POST['btn_login'])) {

            $email = htmlspecialchars(trim($_POST['email']));
            $password = htmlspecialchars(trim($_POST['password']));

            if (empty($email) || empty($password)) {
        ?>
                <div class="alert alert-danger">vous devriez remplir tous les champs requis!</div>
            <?php
            } else if (is_login($email, $password) == 0) {
            ?>
                <div class="alert alert-danger">Vos Identifiants ne vous permets pas de se connecter; Réessayer svp</div>
            <?php
            } else {
                //$info = is_connected($email, $password);
                //$_SESSION['nom']= $info->nom;
                $_SESSION['admin'] = $email;
                //$_SESSION['image']= $info->image;
                //header("Location:/admin/dashboard");
            ?>
                <script>
                    document.location.replace("/admin/dashboard")
                </script>
        <?php
            }
        }
        ?>
        <h3>Vos Identifiants</h3>
        <form action="" method="POST" class="">
            <div class="form-outline">
                <label class="form-label" for="form1"><i class="far fa-user trailing mr-2"></i> Votre E-mail ou Identifiant</label>
                <input type="email" id="form1" name="email" class="form-control form-icon-trailing" />

            </div><br>
            <div class="form-outline">
                <label class="form-label" for="typePassword"><i class="fas fa-key trailing mr-2"></i>votre mot de passe</label>
                <input type="password" id="typePassword" name="password" class="form-control" />
            </div><br>

            <div class="mb-3 form-password-toggle">
                <div class="d-flex justify-content-between">
                    <a href="auth-forgot-password-cover.html">
                        <normal>Mot de passe oublié ?</normal>
                    </a>
                </div>
            </div>

            <div class="mb-3">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" id="remember-me" />
                    <label class="form-check-label" for="remember-me"> Souviens-toi de moi </label>
                </div>


                <button type="submit" name="btn_login" class="btn btn-primary mb-2 btn-lg">Valider</button>
        </form>
    </div>
</div>