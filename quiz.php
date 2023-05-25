<?php
require_once 'includes/header_quiz.php'; ?>

<div class="row">
  <div class="">
    <div class="box">
        <h1 class="text-light text-justify">Bienvenue dans notre plateforme en ligne pour passer nos Quiz en vue d'atteindre la hauteur de la connaissance divine, Gloire au Seigneur</h1>
        <?php
        if(isset($_POST['btn_yes'])){
            $code = htmlentities(trim($_POST['code']));
            $code1 = "Nhl20xs";
            $nom1 = "Noha Luamba";
            $code2 = "NhD20jw";
            $nom2 = "Noha Dianzenza";
            $code3 = "YS20kz";
            $nom3 = "Yohann";
            $code4 = "LN20vs";
            $nom4 = "Lucas Nsango";
            if(empty($code)){
              $_SESSION['alert'] = "veuillez introduire votre code svp, sinon contactez l'admin";
              $_SESSION['alert_text'] = "Sans identifiants vous n'avez pas droit d'y acceder au Quiz,Hallelujah";
              $_SESSION['alert_code'] = "error";
            }
            
            elseif($code === $code1){
              $_SESSION['nom'] = $nom1;
              $_SESSION['alert'] = "Félicitations, ".$_SESSION['nom']." t'es connectés pour le Quiz";
              $_SESSION['alert_text'] = "vous pouvez maintenant aller repondre aux questions,Hallelujah";
              $_SESSION['alert_code'] = "success";
              header("Location:questions.php");
              ?>
              <!-- <script>window.document.location="questions.php";</script> -->
              <?php
            }
            elseif($code === $code2){
              $_SESSION['nom'] = $nom2;
              $_SESSION['alert'] = "Félicitations, ".$_SESSION['nom']." t'es connectés pour le Quiz";
              $_SESSION['alert_text'] = "vous pouvez maintenant aller repondre aux questions,Hallelujah";
              $_SESSION['alert_code'] = "success";
              header("Location:questions.php");
              ?>
              <!-- <script>window.document.location="questions.php";</script> -->
              <?php
            }
            elseif($code === $code3){
              $_SESSION['nom'] = $nom3;
              $_SESSION['alert'] = "Félicitations, ".$_SESSION['nom']." t'es connectés pour le Quiz";
              $_SESSION['alert_text'] = "vous pouvez maintenant aller repondre aux questions,Hallelujah";
              $_SESSION['alert_code'] = "success";
              header("Location:questions.php");
              ?>
              <!-- <script>window.document.location="questions.php";</script> -->
              <?php
            }
            elseif($code === $code4){
              $_SESSION['nom'] = $nom4;
              $_SESSION['alert'] = "Félicitations, ".$_SESSION['nom']." t'es connectés pour le Quiz";
              $_SESSION['alert_text'] = "vous pouvez maintenant aller repondre aux questions,Hallelujah";
              $_SESSION['alert_code'] = "success";
              header("Location:questions.php");
              ?>
              <!-- <script>window.document.location="questions.php";</script> -->
              <?php
            }
            else{
              $_SESSION['alert'] = "Echec, Code Incorrect verifier ou signaler l'admin";
              $_SESSION['alert_text'] = "vous ne pouvez pas  aller aux questions du Quiz,Désolé";
              $_SESSION['alert_code'] = "error";
            }

        }
        ?>
        <form action="" method="POST" class="mt-5">
            <input type="text" name="code" placeholder="Entrer votre code secret">
            <input type="submit" name="btn_yes" value="Envoyer">
        </form>
    </div>
  </div>
</div>
<?php
require_once 'includes/footer_quiz.php';