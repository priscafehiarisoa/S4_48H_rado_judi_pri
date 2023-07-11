<?php include "inc/root.php";?>

<main class="main-content">
    <?php include "inc/up_navbar.php";

    $user=isset($user)?$user:null;
    $compte=isset($compte)?$compte:0;
?>

<div class="container">
    <div class="">
        <h1 class="font-weight-bolder text-capitalize mb-3">Bienvenu chez <span class="text-primary">SelfCare</span> </h1>
    </div>
    <div class="row">
        <div class="col-12 text-end mb-5 mt-3">
            <a class="btn bg-gradient-dark mb-0" href="<?php echo base_url('code/Code/charger_page_utiliser_un_code')?>"><i class="fas fa-plus" aria-hidden="true"></i>&nbsp;&nbsp;utiliser un code</a>
        </div>
    </div>
    <div class="row">
            <div class="card col-4 m-5">
                <div class="card-header">
                    <h5>votre profil</h5>
                </div>
                <div class="card-body">
                    <li class="list-group-item border-0 d-flex p-4 mb-2 bg-gray-100 border-radius-lg">
                        <div class="d-flex flex-column">
                            <h6 class="mb-3 text-sm"><?php echo $user['NAME']?></h6>
                            <span class="mb-2 text-xs"><?php echo $user['EMAIL'] ?><span class="text-dark ms-sm-2 font-weight-bold"><?php echo $user['GENRE'] ?></span>
                                    </span></div>

                    </li>
                </div>
            </div>

            <div class="card col-4 m-5">
                <div class="card-header">
                    <h5>votre compte</h5>
                </div>
                <div class="card-body">
                    <li class="list-group-item border-0 d-flex p-4 mb-2 bg-gray-100 border-radius-lg">
                        <div class="d-flex flex-column">
                            <h6 class="mb-3 text-sm">lo montant de votre compte est </h6>
                            <span class="mb-2 text-xs"><span class="text-dark ms-sm-2 font-weight-bold"><?php echo $compte ?></span>
                                    </span></div>

                    </li>
                </div>
            </div>
            <div class="card col-4 m-5">
                <div class="card-header">
                    <h5>Calorie a depenser</h5>
                </div>
                <div class="card-body">
                    <li class="list-group-item border-0 d-flex p-4 mb-2 bg-gray-100 border-radius-lg">
                        <div class="d-flex flex-column">
                            <h6 class="mb-3 text-sm">Pour atteindre votre objectif,vous devez depenser: </h6>
                            <span class="mb-2 text-xs">
                                <span class="text-dark ms-sm-2 font-weight-bold"><?php echo $calorie ?></span> calories
                                    </span></div>

                    </li>
                </div>
            </div>
    </div>
</div>








</main>
