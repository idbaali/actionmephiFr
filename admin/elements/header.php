

<!-- Start your project here-->  
<!--Navbar -- Menu horizontale -->
<nav class="mb-1 navbar navbar-expand-lg navbar-dark primary-color bg-dark fixed-top">
    <a class="navbar-brand" href="dashboard.php"><img src="/img/hare.jpg" style="height: 40px; width:80px;"><span class="nav1 ml-2 mr-5">Admin - Action Mephi</span></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent-333"
    aria-controls="navbarSupportedContent-333" aria-expanded="false" aria-label="Toggle navigation">
    <i class="fas fa-ellipsis-v toogle_menu" ></i>
  </button>
  <div class="collapse navbar-collapse" id="navbarSupportedContent-333">
    <?php if($_SESSION['image']): ?>
      <ul class="navbar-nav mr-auto">
        <li class="nav-item active ml-5">
          <a class="nav-link" href="/admin/dashboard"><i class="fas fa-home text-danger me-2"></i>Dashboard
            <span class="sr-only">(current)</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="/"><i class="fas fa-desktop text-danger me-2"></i>Voir le site</a>
        </li>
        <!-- <li class="nav-item">
          <a class="nav-link" href="#"><i class="fas fa-history text-danger me-2"></i>Notre histoire</a>
        </li>-->
        <li class="nav-item">
          <a class="nav-link" href="/admin/modification"><i class="fas fa-sync-alt text-danger me-2"></i>Modification</a>
        </li> 
        <li class="nav-item">
          <a class="nav-link" href="/nous-contacter"><i class="fas fa-file-signature text-danger me-2"></i>Contact</a>
        </li>
      </ul>
      <ul class="navbar-nav icon-align">
        <!-- Avatar -->
        <li class="nav-item dropdown">
          <a
            class="nav-link dropdown-toggle d-flex align-items-center"
            href="#"
            id="navbarDropdownMenuLink"
            role="button"
            data-mdb-toggle="dropdown"
            aria-expanded="false"
          >
<!-- ICI  -->
            <img
              src="admin/img/<?= $_SESSION['image']?>"
              class="rounded-circle"
              height="30" width="30"
              alt="<?= $_SESSION['nom']?>"
              loading="lazy"
            />
<!-- ICI  -->
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
            <li><a class="dropdown-item" href="/admin/mon-profil">Mon profil</a></li>
            <li><a class="dropdown-item" href="/admin/reglages">Réglages</a></li>
            <li><a class="dropdown-item" href="/admin/logout">Déconnexion</a></li>
          </ul>
        </li>
      </ul>
    <?php endif; ?>
  </div>
</nav>
<!--/.Navbar -->
