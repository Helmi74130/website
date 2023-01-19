<?php @session_start() ?>
<header class="pt-3 pt-md-5 fs-3">
      <div class="row gx-0">
        <div class="col-12 col-md-3 d-flex justify-content-center">
          <a class="nav-link fs-1-m text-logo" href="/"><img class="logo" height="80px" src="/img/logo.webp" alt="logo de l'entreprise">My website</a>
        </div>
        <div class="content-navlink col-12 col-md-8 d-flex justify-content-center justify-content-md-end mt-3 mt-md-0">
          <div class="d-flex justify-content-center align-items-center">
            <a class="nav-link me-3 link-nav" href="/">Accueil</a>
          </div>

          <?php
            if (!isset($_SESSION["user"])) {
            echo '
            <div class="d-flex justify-content-center align-items-center">
              <a class="nav-link me-sm-3 me-1 link-nav" href="/index.php#make">Réalisation</a>
            </div>
            <div class="d-flex justify-content-center align-items-center">
              <a class="nav-link me-sm-3 me-1 link-nav" href="/index.php#contact">Contact</a>
            </div>
            <div class="d-flex justify-content-center align-items-center">
              <a class="nav-link me-sm-3 me-1 link-nav" href="/index.php#price">Tarifs</a>
            </div>';
            }
          ?>
          
          <div class="d-flex justify-content-center align-items-center">
            <a class="nav-link me-sm-3 me-1 link-nav" href="/php/articles.php">Articles</a>
          </div>
          <!-- <div class="d-flex justify-content-center align-items-center">
            <a class="nav-link link-nav" href="/index.php#faq">FAQ</a>
          </div> -->
          <?php
            if (isset($_SESSION["user"])) {
            echo '<div class="d-flex justify-content-center align-items-center">
                    <a class="nav-link link-nav" href="/php/deconnexion.php">Déconnexion</a>
                  </div>';
            }
          ?>
        </div>
      </div>
</header>