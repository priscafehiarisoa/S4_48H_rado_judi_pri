

<?php
defined('BASEPATH') OR exit('No direct script access allowed');
include "inc/root.php";
?>

<body class="g-sidenav-show  bg-gray-100">
<?php include"inc/navbar.php"; ?>
<main class="main-content position-relative max-height-vh-100 h-100 mt-1 border-radius-lg ">
    <?php include 'inc/up_navbar.php'?>
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-lg-8">
                <div class="row">
                    <div class="col-xl-12 mb-xl-0 mb-2">
                        <div class="card bg-transparent shadow-xl">
                            <div class="overflow-hidden position-relative border-radius-xl" style="background-image: url('../assets/img/curved-images/curved14.jpg');">
                                <div class="card-header">
                                    Ajout repas
                                </div>
                                <div class="card-body position-relative z-index-1 p-3">
                                    <form action="<?php echo base_url('controller/saveRepas'); ?>" method="post">
                                        <div class="form-group">
                                            <label for="types">Types</label>
                                            <input class="form-control" type="text" name="types" id="types">
                                        </div>
                                        <div class="form-group">
                                            <label for="nom">Nom</label>
                                            <input class="col-xl-12 mb-xl-0 mb-2" type="text" name="nom" id="nom">
                                        </div>
                                        <div class="form-group">
                                            <label for="nbcalories">Nombre calories</label>
                                            <input class="form-control" type="number" name="nbcalories" id="nbcalories">
                                        </div>
                                        <div class="form-group">
                                            <label for="prix">Prix</label>
                                            <input class="form-control" type="number" name="prix" id="prix">
                                        </div>
                                        <div class="form-group">
                                            <label for="composant">Composant</label>
                                            <select class="form-select" name="composant" id="composant">
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

            <div class="row">
                <div class="col-md-8 mt-4">
                    <div class="card">
                        <div class="card-header pb-0 px-3">
                            <h6 class="mb-0">liste des repas </h6>
                        </div>
                        <div class="card-body pt-4 p-3">
                            <ul class="list-group">
                                <?php for($i = 0; $i < count($repas); $i++) { ?>
                                    <li class="list-group-item border-0 d-flex p-4 mb-2 bg-gray-100 border-radius-lg">
                                        <div class="d-flex flex-column">
                                            <h6 class="mb-3 text-sm"><?php echo $repas[$i]['NOMREPAS'] ;?></h6>
                                            <span class="mb-2 text-xs">Calories<span class="text-dark ms-sm-2 font-weight-bold"><?php echo $repas[$i]['CALORIEDONEE'] ;?></span>
                                        </div>
                                        <div class="ms-auto text-end">
                                            <a class="btn btn-link text-danger text-gradient px-3 mb-0" href="<?php echo base_url('controller/deleterepas'); ?>?idrepas=<?php echo $repas[$i]['IDREPAS'] ;?>"><i class="far fa-trash-alt me-2"></i>Delete</a>
                                            <a class="btn btn-link text-dark px-3 mb-0" href="<?php echo base_url('controller/modifrepas'); ?>?idrepas=<?php echo $repas[$i]['IDREPAS'] ;?>"><i class="fas fa-pencil-alt text-dark me-2" aria-hidden="true"></i>Edit</a>
                                        </div>
                                    </li>
                                <?php } ?>
                            </ul>
                        </div>
                    </div>
                </div>
            <?php include 'inc/footer.php';?>