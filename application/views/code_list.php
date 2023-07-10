<?php

defined('BASEPATH') or exit('No direct script access allowed');

include "inc/root.php" ;
if(!isset($codes)){
    $codes=array();
}


?>
<main class="main-content">
    <div class="card mb-4">
        <div class="card-header pb-0 ">
            <h6>Liste des Codes </h6>
        </div>
        <div class="card-body px-0 pt-0 pb-2">
            <div class="table-responsive p-0">
                <table class="table align-items-center mb-0">
                    <thead>
                    <tr>
                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">id code</th>
                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">code</th>
                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">valeurs</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php for($i = 0; $i < count($codes); $i++) {?>
                    <tr>
                        <td>
                            <div class="d-flex px-2 py-1">
                                <div class="d-flex flex-column justify-content-center">
                                    <h6 class="mb-0 text-sm"><?php echo $codes[$i]->IDCODE?></h6>
                                </div>
                            </div>
                        </td>
                        <td>
                            <p class="text-xs font-weight-bold mb-0"><?php echo $codes[$i]->CODE?></p>
                        </td>
                        <td class="align-middle text-center">
                            <span class="text-secondary text-xs font-weight-bold"><?php echo $codes[$i]->VALEUR?></span>
                        </td>
                        <td class="align-middle">
                            <a href="javascript:;" class="text-primary font-weight-bold text-xs" data-toggle="tooltip" data-original-title="Edit user">
                                Edit
                            </a>
                        </td>
                    </tr>
                    <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</main>
