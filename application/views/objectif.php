<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="http://localhost/S4_48H_rado_judi_pri/assets/css/style.css">
    <title>Document</title>
</head>
<body>
    <section>
        <form action="<?php echo base_url('controller/saveObjectif'); ?>" method="post">
            <input type="hidden" name="poids" value="<?php echo $poids; ?>">
            <div class="radio">

                <input type="radio" name="objectif" id="augmenter" value="1">
                <label class="profile" for="augmenter">Augmenter</label>

                <input type="radio" name="objectif" id="reduire" value="-1">
                <label class="profile" for="reduire">Reduire</label>
            </div>
            <label for="cibles">Poids cible</label>
            <input type="number" name="poids" id="cibles"><br/>
            <input type="submit" value="Sauvegarder">
        </form>
    </section>
</body>
</html>