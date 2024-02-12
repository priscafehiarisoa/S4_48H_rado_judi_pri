<?php
defined('BASEPATH') OR exit('No direct script access allowed');
include "inc/root.php";
?>
<body>
<div class="col-lg-8">
    <div class="row">
        <div class="col-xl-12 mb-xl-0 mb-2">
            <div class="card bg-transparent shadow-xl">
                <div class="overflow-hidden position-relative border-radius-xl" style="background-image: url('../assets/img/curved-images/curved14.jpg');">
                    <span class="mask bg-gradient-dark"></span>
                    <div class="card-header">
                        Ajout repas
                    </div>
                    <div class="card-body position-relative z-index-1 p-3">
                        <form action="<?php echo base_url('controller/changeRepas'); ?>" method="post">
                            <input type="hidden" name="idrepas" value="<?php echo $idrepas; ?>">
                            <div class="form-group">
                                <label for="types">Types</label>
                                <input class="col-xl-12 mb-xl-0 mb-2" type="text" name="types" id="types">
                            </div>
                            <div class="form-group">
                                <label for="nom">Nom</label>
                                <input class="col-xl-12 mb-xl-0 mb-2" type="text" name="nom" id="nom">
                            </div>
                            <div class="form-group">
                                <label for="nbcalories">Nombre calories</label>
                                <input class="col-xl-12 mb-xl-0 mb-2" type="number" name="nbcalories" id="nbcalories">
                            </div>
                            <div class="form-group">
                                <label for="prix">Prix</label>
                                <input class="col-xl-12 mb-xl-0 mb-2" type="number" name="prix" id="prix">
                            </div>
                            <div class="form-group">
                                <label for="composant">Composant</label>
                                <select class="col-xl-12 mb-xl-0 mb-2" name="composant" id="composant">
                                    <option value="3">Viande</option>
                                    <option value="2">Poisson</option>
                                    <option value="1">Poulet</option>
                                    <option value="0">Autres</option>
                                </select>
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
