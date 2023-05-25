<?php
if(isset($_SESSION['nom'])){
    header("Location:quiz.php");
}
require_once 'includes/header_quiz.php'; ?>
    <div class="row">
        <div class="col-md-4 box">
            <h5 class="text-light text-justify">Mets la paix dans ton coeur, le Quiz est si simple que tu n'y peux imaginer. Le jeux c'est de cochez un numéro au choix ou au hasard, et repondez en rapport avec le sujet qui s'affichera  dans la boite de dialogue. <br>Le Bonheur est sur ton chemin Hallelujah</h5><hr class="mb-4 text-dark">
            <form action="" method="POST">
            <?php
        if(isset($_POST['btn1'])){

              $_SESSION['alert'] = "Cette question concerne la prière!";
              $_SESSION['alert_text'] = "Il s'agit de parler brièvement de modèle, type(sorte) des prières";
            }
            if(isset($_POST['btn2'])){

                $_SESSION['alert'] = "Cette question concerne La prière en langues!";
                $_SESSION['alert_text'] = "Il s'agit de parler ouvertement de la prière en langues et ses avantages";
              }

              if(isset($_POST['btn3'])){

                $_SESSION['alert'] = "Cette question concerne le ministère!";
                $_SESSION['alert_text'] = "Il s'agit d'expliquer c'est quoi le ministère et le role de chacun.";
              }
              if(isset($_POST['btn4'])){

                $_SESSION['alert'] = "Cette question concerne les dons de puissance!";
                $_SESSION['alert_text'] = "Il s'agit de réveler d'après ce qu'on a appris,citez et expliquer";
              }
              if(isset($_POST['btn5'])){

                $_SESSION['alert'] = "Cette question concerne la vie de Samson";
                $_SESSION['alert_text'] = "Il s'agit de décrire son biographie, y compris ses parents et la fin de sa vie.";
              }
              if(isset($_POST['btn6'])){

                $_SESSION['alert'] = "Cette question concerne les dons spirituels";
                $_SESSION['alert_text'] = "Il s'agit de parler brièvement des tous les dons vu dans l'enseignement et expliquer avec des exemples.";
              }
              if(isset($_POST['btn7'])){

                $_SESSION['alert'] = "Cette question concerne Les langages de Dieu!";
                $_SESSION['alert_text'] = "Il s'agit de parler brièvement les moyens que Dieu exploite pour nous parler et comment.";
              }
              if(isset($_POST['btn8'])){

                $_SESSION['alert'] = "Cette question concerne Le jeùne";
                $_SESSION['alert_text'] = "Il s'agit d'expliquer le pourquoi et les avantages de jeunes et prière tant que disciples.";
              }
              if(isset($_POST['btn9'])){

                $_SESSION['alert'] = "Cette question concerne l'appel";
                $_SESSION['alert_text'] = "Il s'agit de parler brièvement de l'appel,la difference existante entre fils et enfants de Dieu.";
              }

            
          
        
        ?>
                <div class="row">
                    <div class="col-md-4">
                        <button name="btn1" class="btn btn-danger btn-lg btn-block">1</button>
                    </div>
                    <div class="col-md-4">
                        <button name="btn2" class="btn btn-secondary btn-lg btn-block">2</button>
                    </div>
                    <div class="col-md-4">
                        <button name="btn3" class="btn btn-danger btn-lg btn-block">3</button>
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col-md-4">
                        <button name="btn4" class="btn btn-primary btn-lg btn-block">4</button>
                    </div>
                    <div class="col-md-4">
                        <button name="btn5" class="btn btn-dark btn-lg btn-block">5</button>
                    </div>
                    <div class="col-md-4">
                        <button name="btn6" class="btn btn-primary btn-lg btn-block">6</button>
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col-md-4">
                        <button name="btn7" class="btn btn-warning btn-lg btn-block">7</button>
                    </div>
                    <div class="col-md-4">
                        <button name="btn8" class="btn btn-danger btn-lg btn-block">8</button>
                    </div>
                    <div class="col-md-4">
                        <button name="btn9" class="btn btn-info btn-lg btn-block">9</button>
                    </div>
                </div>
            </form>
            <p class="text-white mt-3">Je vous souhaite bonne chance et pleins de reussite pour ce prémier Quiz; Que la grace du seigneur et la communion du Saint-Esprit soit sur chacun.</p>
        </div>
    </div>
<?php
require_once 'includes/footer_quiz.php'; ?>