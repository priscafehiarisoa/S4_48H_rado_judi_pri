
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

include "inc/root.php"?>
<body class="g-sidenav-show  bg-gray-100">

  <section class="min-vh-100 mb-8">
    <div class="page-header align-items-start min-vh-50 pt-5 pb-11 m-3 border-radius-lg" style="background-image: url('http://localhost/projet48h/assets/img/curved-images/curved14.jpg');">
      <span class="mask bg-gradient-dark opacity-6"></span>
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-lg-5 text-center mx-auto">
            <h1 class="text-white mb-2 mt-5">Bienvenue!</h1>
            <p class="text-lead text-white"></p>
          </div>
        </div>
      </div>
    </div>
    <div class="container">
      <div class="row mt-lg-n10 mt-md-n11 mt-n10">
        <div class="col-xl-4 col-lg-5 col-md-7 mx-auto">
          <div class="card z-index-0 p-5">
            <div class="card-header text-center pt-4">
              <h5>Inscription</h5>
            </div>

              <div class="card-body">
                  <form  method="post" action="<?php echo base_url('controller/signup'); ?>">
                      <div class="mb-3">
                          <input type="text" class="form-control" placeholder="Name" aria-label="Name" aria-describedby="email-addon" name="name">
                      </div>
                      <div class="mb-3">
                          <input type="email" class="form-control" placeholder="Email" aria-label="Email" aria-describedby="email-addon" name="email">
                      </div>
                      <div class="mb-3">
                          <input type="password" class="form-control" placeholder="Password" aria-label="Password" aria-describedby="password-addon" name="password">
                      </div>
                      <div class="form-group">
                          <input type="radio"  name="genre" id="masculin" value="1">
                          <label class="" for="masculin">Masculin</label>

                          <input type="radio" name="genre" id="feminin" value="2">
                          <label class="" for="feminin">Feminin</label>
                      </div>

                      <!--                  <div class="form-group mb-3">-->
                      <!--                      <input type="radio" class="form-check"  name="genre" id="masculin" value="1">-->
                      <!--                      <label for="masculin">Masculin</label>-->
                      <!--                      <input type="radio" class="form-check" name="genre" id="feminin" value="2">-->
                      <!--                      <label for="feminin">Feminin</label>-->
                      <!--                  </div>-->
                      <div class="text-center">
                          <input type="submit" class="btn bg-gradient-dark w-100 my-4 mb-2" value="Sign up">
                      </div>
                      <p class="text-sm mt-3 mb-0">Already have an account? <a href="javascript:;" class="text-dark font-weight-bolder">Sign in</a></p>
                  </form>
              </div>

            </div>
            </div>

          </div>
        </div>
      </div>
    </div>
  </section>
 <?php include "inc/footer.php";