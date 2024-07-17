<?php
if (isset($living)){
}

?>
<head>
    <title>Dashboard - Edit Living</title>
    <link rel="stylesheet" href="<?php echo ASSETSCSS; ?>dashboard.css"/>
</head>

<header class="view-header--animal">
    <h1 class="view-title">Modifier un habitat</h1>
</header>

<!--View Menu + content-->
<section class="addAnimal-container">
    <div class="form-container">
        <form class="form" action="<?php echo HOST ?>updateLiving/id/<?php echo $living->getId() ?>" method="post" enctype="multipart/form-data">
            <ul>
                <li >
                    <label class="form-field" for="name"> Nom Habitat:
                        <input type="text" name="name" placeholder="Savane" value="<?php echo $living->getName()?>" required>
                    </label>
                </li>
                <li >
                    <label class="form-field" for="description"> Description:
                        <textarea rows="5" cols="33"  name="description" placeholder="Texte de description" required><?php echo $living->getDescription() ?></textarea>
                    </label>
                </li>
                <li>
                    <label  class="form-field" for="file"> Photo actuelle:


                        Choisir une autre photo :
                        <input type="file" name="file">
                    </label>
                </li>
                <li>
                    <div class="form-buttonContainer">
                        <button class="button button--success" type="submit">Modifier</button>
                        <a class="button button--danger" href="<?php echo HOST; ?>dashboardLivings" >Annuler</a>
                    </div>
                </li>
            </ul>
        </form>

    </div>
</section>

