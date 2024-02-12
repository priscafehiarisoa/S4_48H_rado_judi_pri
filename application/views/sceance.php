

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
                                    Ajout sceance
                                </div>
                                <div class="card-body position-relative z-index-1 p-3">
                                    <form action="<?php echo base_url('controller/savePlats'); ?>" method="post">
                                        <div class="form-group">
                                            <label for="nom">Nom</label>
                                            <input class="col-xl-12 mb-xl-0 mb-2" type="text" name="nom" id="nom">
                                        </div>
                                        <?php for ($i = 0; $i < count($allExo); $i++){ ?>
                                            <div class="form-group">
                                                <label for="check"><?php echo $allExo[$i]['NOMEXERCICE']; ?></label>
                                                <input class="form-check" type="checkbox" name="exercice" id="check">
                                            </div>
                                            <div class="form-group">
                                                <label for="repet">Repetition</label>
                                                <input class="form-control" type="number" name="repetition" id="repet">
                                            </div>
                                        <?php } ?>
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
            <?php include 'inc/footer.php';?>
