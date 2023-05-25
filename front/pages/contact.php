<?php
require_once 'includes/nav.php'; ?>
<section class="horange">
    <div class="container margin_nav">
        <?php
            /** traitement envoie message */
            if(isset($_POST['btn_contact'])){
                $nom = htmlspecialchars(trim($_POST['nom']));
                $email = htmlspecialchars(trim($_POST['email']));
                $message = htmlspecialchars(trim($_POST['message']));
                $destinateur = "info@actionmephi.com";
                $objet = "Démande de renseignements";
                $header="MIME-Version:1.0\r\n";
                $header.='From:"Action Mephi"<info@actionmephi.com>'."\n";
                $header.='Content-Type:text/html; charset="utf-8"'."\n";
                $header.='Content-Transfert-Encoding:8bit';

                ob_start();
                require_once 'mail/regular/email.php';
                $description = ob_get_clean();
                if(empty($nom) || empty($email) || empty($message)){
                    ?>
                    <div class="alert alert-danger">Vous devriez remplir tous les champs requis svp</div>
                <?php
                }else{
                    mail($destinateur,$objet, $description,$header);
                    ?>
                <div class="alert alert-success"><b>Felicitations</b> Votre message a été envoyé à l'équipe <b>Providence santé</b></div>
                <?php
                }
            }
        ?>
        <h1>Nous contacter !</h1> 
        <div class="row">
            <div class="col-12 col-sm-12 col-lg-5 col-md-5">
                <img class=" mt-1" src="img/contact.jpg" class="img-thumbnail mb-2" width="100%" alt="contact mephi">
            </div>
            <div class="col-12 col-sm-12 col-lg-7 col-md-7">
                <form action="" method="POST" class="mt-1">
                    <input type="text" class="form-control" placeholder="votre prénom" name="prenom"><br>
                    <input type="text" class="form-control" placeholder="votre nom" name="nom"><br>
                    <input type="text" class="form-control" placeholder="votre email" name="email"><br>
                    <textarea name="message" id="" rows="3" class="form-control" placeholder="votre message"></textarea>
                    <button type="submit" class="form-control btn btn-outline-info mt-1" name="btn_contact">Envoyer</button>
                </form>
            </div>
        </div>
        <p class="text-justify mt-3 text-light descript">Venez nous rencontrer dans notre chaleureux espace de travail où nous aurons plaisir à vous accueillir.

Stationnement accessible à tous au cœur de la propriété.</p>
    </div>
</section>
<?php
require_once 'includes/footer.php'; ?>