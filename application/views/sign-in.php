<!--
=========================================================
* Soft UI Dashboard - v1.0.3
=========================================================

* Product Page: https://www.creative-tim.com/product/soft-ui-dashboard
* Copyright 2021 Creative Tim (https://www.creative-tim.com)
* Licensed under MIT (https://www.creative-tim.com/license)

* Coded by Creative Tim

=========================================================

* The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.
-->
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

include "inc/root.php"?>
<body class="">

  <main class="main-content  mt-0">
    <section>
      <div class="page-header min-vh-75">
        <div class="container">
          <div class="row">
            <div class="col-xl-4 col-lg-5 col-md-6 d-flex flex-column mx-auto">
              <div class="card card-plain mt-8">
                <div class="card-header pb-0 text-left bg-transparent">
                  <h3 class="font-weight-bolder text-info text-gradient">Bievenue à <span class="h2">SelfCare</span></h3>
                  <p class="mb-0">entrez votre email et pot de passe pour vous connecter</p>
                </div>
                <div class="card-body">
                  <form  method="post" action="<?php echo base_url('controller/connection'); ?>">
                    <label>Email</label>
                    <div class="mb-3">
                      <input type="email" class="form-control" placeholder="Email" aria-label="Email" aria-describedby="email-addon" name="email">
                    </div>
                    <label>Mot de passe</label>
                    <div class="mb-3">
                      <input type="password" class="form-control" placeholder="Mot de passe " aria-label="Password" aria-describedby="password-addon" name="password">
                    </div>

                    <div class="text-center">
                      <input type = "submit" class="btn bg-gradient-info w-100 mt-4 mb-0" value="connexion">
                    </div>
                  </form>
                </div>
                <div class="card-footer text-center pt-0 px-lg-2 px-1">
                  <p class="mb-4 text-sm mx-auto">
                    Pas encore inscrits?
                    <a href="<?php echo base_url('Controller/inscription')?>" class="text-info text-gradient font-weight-bold">Sign up</a>
                  </p>
                </div>
              </div>
            </div>
            <div class="col-md-6">
              <div class="oblique position-absolute top-0 h-100 d-md-block d-none me-n8">
                <div class="oblique-image bg-cover position-absolute fixed-top ms-auto h-100 z-index-0 ms-n6" style="background-image:url(<?php echo $this->config->item('my_variable')."/assets/img/food/diet4.jpg"?>"></div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </main>

  <?php include "inc/footer.php"; ?>
  <script>
    var win = navigator.platform.indexOf('Win') > -1;
    if (win && document.querySelector('#sidenav-scrollbar')) {
      var options = {
        damping: '0.5'
      }
      Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
    }
  </script>
  <!-- Github buttons -->
  <script async defer src="https://buttons.github.io/buttons.js"></script>
  <!-- Control Center for Soft Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="http://localhost/projet48h/assets/js/soft-ui-dashboard.min.js?v=1.0.3"></script>
</body>

</html>
