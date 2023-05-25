    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
    <script src="js/sweetalert.js"></script>
    <?php
    //affichage des erreurs avec sweetalert 
    if(isset($_SESSION['alert']) && ($_SESSION['alert'] != '')){
      ?>
       <script>
          swal({
              title: "<?=$_SESSION['alert'];?>",
              text: "<?=$_SESSION['alert_text']?>",
              icon: "<?=$_SESSION['alert_code']?>",
              button: "Ok, c'est compris!",
            });
        </script>
      <?php
      unset($_SESSION['alert']);
    }
    ?>
  </body>
</html>