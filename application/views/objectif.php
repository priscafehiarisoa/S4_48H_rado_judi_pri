<?php
include "inc/root.php"
?>
<body>
<main class="main-content">
    <div class="container p-5">
        <div class="card offset-3 col-6">
            <div class="card-header">
                <h3 class="font-weight-bolder text-capitalize mb-3">veuillez completer votre profil</h3>
            </div>
            <section class="card-body">
                <form action="<?php echo base_url('controller/saveObjectif'); ?>" method="post">
                    <h4 class="text-primary"> Quel est votre objectif ? </h4>
                    <div class="radio mt-5 mb-5">
    <section>
        <form action="<?php echo base_url('controller/saveObjectif'); ?>" method="post">
            <input type="hidden" name="poids" value="<?php echo $poids; ?>">
            <div class="radio">

                        <input type="radio" name="objectif" id="augmenter" value="1">
                        <label class="profile" for="augmenter">Augmenter votre poids ?</label>

                        <input type="radio" name="objectif" id="reduire" value="-1">
                        <label class="profile" for="reduire">Reduire réduire votre poids</label>
                    </div>
                    <div class="from-control">
                        <label for="cibles">Poids cible</label>
                        <input type="number"  class="form-control" name="cibles" id="cibles"><br/>
                    </div>
                    <?php if( isset($erreur)){?>
                        <p><?php echo $erreur; ?></p>
                    <?php }?>
                    <div class="form-group">
                        <input type="submit" value="Sauvegarder" class="btn btn-primary">
                    </div>
                </form>
            </section>
        </div>
    </div>
</main>
</body>
