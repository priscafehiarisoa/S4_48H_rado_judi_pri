<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <section>
        <h1>Objectif</h1>
        <form action="<?php echo base_url('controller/saveObjectif'); ?>" method="post">
            <label for="augmenter">Augmenter</label>
            <input type="radio" name="objectif" id="augmenter" value="1"><br/>
            <label for="reduire">Reduire</label>
            <input type="radio" name="objectif" id="reduire" value="-1"><br/>
            <label for="cibles">Poids cible</label>
            <input type="number" name="poids" id="cibles"><br/>
            <input type="submit" value="Sauvegarder">
        </form>
    </section>
</body>
</html>