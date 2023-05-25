$(document).ready(function() {
  $('.projet').hide();
  $('.actualites').hide();

  $('.btn-actualites').click(function(){
    $('.actualites').toggle();
  })
  //pour panel projet dans dashboard
  $('.btn-projet').click(function(){
    $('.projet').toggle();
  })
  //alert('zoba');
//mettre swetalert
/*     Swal.fire({
       title: '<strong>Bienvenue dans <u>Action Mephi</u></strong>',
       icon: 'info',
       html:
         'Nous vous signalons que le site est en construction</b>, ' +
         "Et pour plus d'Information, Contacter " + '<a href="https://api.whatsapp.com/send?phone=33651294692&text=&source=&data=">Softhandy.fr</a>',
       showCloseButton: true,
       showCancelButton: true,
       focusConfirm: false,
       confirmButtonText:
         '<i class="fa fa-thumbs-up"></i> je vais entrer voir le site',
       confirmButtonAriaLabel: 'Thumbs up, great!',
       cancelButtonText:
         '<i class="fa fa-thumbs-down"></i>' + '<a href="http://google.fr"> Non, je ne veux pas!!</a>',
       cancelButtonAriaLabel: 'Thumbs down'
     }) */


//traitement Js du nouveau
})