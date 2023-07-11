<?php
defined('BASEPATH') OR exit('No direct script access allowed');

include "inc/root.php"?>
<body>
<?php include_once "inc/navbarClient.php";?>

<main class="main-content">
    <?php     include "inc/up_navbar.php";
?>
    <div class="">
        <h3 class="font-weight-bolder text-capitalize mb-3">code</h3>
    </div>
    <div class="container">
        <form action="<?php echo isset($codeModif)?base_url('code/Code/update_code'):base_url('code/Code/enregistrer_code')?>" method="post">

            <?php if( isset($codeModif)){?>
            <input type="hidden" name="idcode" value="<?php echo $codeModif->IDCODE?>">
            <?php }?>
            <div class="card offset-3 mt-10 mb-5 col-5 ">
                <div class="card-header">
                    <h4>formulaire d'ajout de code </h4>
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <label for="code">code</label>
                        <input type="text" name="code" id="code" class="form-control <?php echo (isset($code))?"input_danger":"" ?>" value="<?php echo isset($codeModif)?$codeModif->CODE:''?>">
                        <p class="text-danger dz-error-message"><?php echo (isset($code))?$code:"" ?></p>
                    </div>

                    <div class="form-group">
                        <label for="valeur">valeur</label>
                        <input type="number" name="valeur" id="valeur" class="form-control <?php echo (isset($valeurs))?"input_danger":"" ?>" value="<?php echo isset($codeModif)?$codeModif->VALEUR:''?>">
                        <p class="text-danger dz-error-message"><?php echo (isset($valeurs))?$valeurs:"" ?></p>

                    </div>

                    <div class="form-group">
                        <input type="submit" value="valider" class="btn btn-primary">
                    </div>
                </div>
            </div>
        </form>
    </div>
</main>
<?php include "inc/footer.php";?>
</body>
<style>
    .input_danger{
        border-color: #da2c38;
        background-color: #f8e3e5;
    }
</style>

