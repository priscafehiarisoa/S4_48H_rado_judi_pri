<?php
defined('BASEPATH') OR exit('No direct script access allowed');
include "inc/root.php";
?>
<body>
<?php include "inc/navbar.php"?>
<main class="main-content">

    <div class="container">
        <?php include "inc/up_navbar.php";?>
        <div class="col-lg-8">
            <div class="">
                <h3 class="font-weight-bolder  text-capitalize mb-5">Modifications</h3>
            </div>
            <div class="row">
                <div class="col-xl-12 mb-xl-0 mb-2">
                    <div class="card bg-transparent shadow-xl p-3">
                        <div class="overflow-hidden position-relative border-radius-xl" >
                            <span class="mask"></span>
                            <div class="card-header">
                                <h4 class="">Ajouter un type de repas repas</h4>
                            </div>
                            <div class="card-body position-relative z-index-1 p-3">
                                <form action="<?php echo base_url('controller/changeExercice'); ?>" method="post">
                                    <input type="hidden" name="idexercice" value="<?php echo $idexercice; ?>">
                                    <div class="form-group">
                                        <label for="nom">Nom</label>
                                        <input class="form-control" type="text" name="nom" id="nom">
                                    </div>
                                    <div class="form-group">
                                        <label for="dpcalories">Depense calories</label>
                                        <input class="form-control" type="number" name="dpcalories" id="dpcalories">
                                    </div>
                                    <div class="form-group">
                                        <input type="submit" value="valider" class="btn btn-primary">
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
</body>

