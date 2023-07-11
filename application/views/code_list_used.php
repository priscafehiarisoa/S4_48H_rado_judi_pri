<?php

defined('BASEPATH') or exit('No direct script access allowed');

include "inc/root.php" ;
if(!isset($listecodes)){
    $listecodes=array();
}


?>
<body>
<?php include_once "inc/navbar.php";?>


<main class="main-content mt-0 p-5">
    <section>


    </section>
    <section>
        <?php include "inc/up_navbar.php";
        ?>

        <div class="col-12 text-end mb-5 mt-3">
            <a class="btn bg-gradient-dark mb-0" href="<?php echo base_url('code/Code/index')?>"><i class="fas fa-plus" aria-hidden="true"></i>&nbsp;&nbsp;Ajouter un nouveau code</a>
        </div>
        <div class="">
            <h3 class="font-weight-bolder text-capitalize mb-3">liste des codes utilisés</h3>
        </div>
        <div class="card mb-4">


            <div class="card-body px-0 pt-0 pb-2">
                <div class="table-responsive p-0">
                    <table class="table align-items-center mb-0">
                        <thead>
                        <tr>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">id code</th>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">code</th>
                            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">valeurs</th>
                            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7"></th>
                            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7"></th>
                            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7"></th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php for($i = 0; $i < count($listecodes); $i++) {?>
                            <tr>
                                <td>
                                    <div class="d-flex px-2 py-1">
                                        <div class="d-flex flex-column justify-content-center">
                                            <h6 class="mb-0 text-sm"><?php echo $listecodes[$i]->IDCODE?></h6>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <p class="text-sm font-weight-bold mb-0"><?php echo $listecodes[$i]->CODE?></p>
                                </td>
                                <td class="align-middle text-center">
                                    <span class="text-secondary text-sm font-weight-bold"><?php echo $listecodes[$i]->VALEUR?></span>
                                </td>

                                <td class="align-middle text-center">
                                    <span class="text-secondary text-sm font-weight-bold"><?php echo $listecodes[$i]->NAME?></span>
                                </td>
                                <td class="align-middle text-center">
                                    <a class="btn btn-link text-danger text-gradient px-3 mb-0" href="<?php echo base_url('code/Code/valider_code/'.$listecodes[$i]->IDCODE."/".$listecodes[$i]->IDUSER)?>"><i class="far fa-trash-alt me-2" aria-hidden="true"></i>Delete</a>
                                </td>
                                <td class="align-middle text-center">

                                </td>
                            </tr>
                        <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>


</main>

</body>