<?php
defined('BASEPATH') OR exit('No direct script access allowed');
include "inc/root.php";
?>
<body>
<div class="col-lg-8">
    <div class="">
        <h3 class="font-weight-bolder text-capitalize mb-3">Modifications</h3>
    </div>
    <div class="row">
        <div class="col-xl-12 mb-xl-0 mb-2">
            <div class="card bg-transparent shadow-xl">
                <div class="overflow-hidden position-relative border-radius-xl" style="background-image: url('../assets/img/curved-images/curved14.jpg');">
                    <span class="mask bg-gradient-dark"></span>
                    <div class="card-header">
                        Ajout repas
                    </div>
                    <div class="card-body position-relative z-index-1 p-3">
                        <form action="<?php echo base_url('controller/changeExercice'); ?>" method="post">
                            <input type="hidden" name="idexercice" value="<?php echo $idexercice; ?>">
                            <div class="form-group">
                                <label for="nom">Nom</label>
                                <input class="col-xl-12 mb-xl-0 mb-2" type="text" name="nom" id="nom">
                            </div>
                            <div class="form-group">
                                <label for="dpcalories">Depense calories</label>
                                <input class="col-xl-12 mb-xl-0 mb-2" type="number" name="dpcalories" id="dpcalories">
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
</body>
</html>

