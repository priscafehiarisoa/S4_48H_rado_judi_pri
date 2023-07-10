<?php
defined('BASEPATH') OR exit('No direct script access allowed');
//include "inc/root.php"
?>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
<div class="container">
    <div class="card">
        <div class="card-header">
            veuillez completer votre profil
        </div>
        <div class="card-body">
            <form action="<?php echo site_url('Profile/completion_profile')?>" method="post">
                <div class="form-group">
                    <label for="age"> age </label>
                    <input type="number" name="age" class="form-control" id="age">
                    <p>message d'erreur</p>
                </div>
                <div class="form-group">
                    <label for="poids"> poids </label>

                    <input type="number" name="poids" class="form-control" id="poids">
                    <p>message d'erreur</p>
                </div>
                <div class="form-group">
                    <label for="taille"> taille </label>

                    <input type="number" name="taille" class="form-control" id="taille">
                    <p>message d'erreur</p>
                </div>

                <div class="form-group">
                    <input type="submit" value="valider" class="btn btn-outline-primary">
                </div>
            </form>
        </div>
    </div>
</div>