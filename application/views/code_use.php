<?php

defined('BASEPATH') or exit('No direct script access allowed');

include "inc/root.php" ;
if(!isset($codes)){
    $codes=array();
}


?>
<body>
<?php include_once "inc/navbar.php";?>


<main class="main-content mt-0 p-5">
    <section>
        <?php include "inc/up_navbar.php";
        ?>

        <div class="">
            <h3 class="font-weight-bolder text-capitalize mb-3">formulaire </h3>
        </div>
        <section class="mb-6">
            <form action="<?php echo base_url('code/Code/utiliser_un_code')?>" method="post">
               <div class="card">
                   <div class="card-header">
                       <h3>utiliser un code</h3>
                   </div>
                   <div class="card-body">
                       <div class="row">
                           <label for="code">code</label>

                       <div class="col-6">
                               <input type="text" name="code" id="code" class="form-control col-5" placeholder="12345678910112">
                                <p class="text-danger"><?php echo isset($erreur)?$erreur:""?></p>
                       </div>
                       <div class="col-3">
                           <input type="submit" value="utiliser le code" class="btn btn-outline-primary ">
                       </div>
                       </div>
                   </div>
               </div>
            </form>


        </section>

        <div class="card mb-4">
            <div class="card-header pb-0 ">
                <h3>Liste des Codes </h3>

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
                                    <p class="text-sm font-weight-bold mb-0"><?php echo $codes[$i]->CODE?></p>
                                </td>
                                <td class="align-middle text-center">
                                    <span class="text-secondary text-sm font-weight-bold"><?php echo $codes[$i]->VALEUR?></span>
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