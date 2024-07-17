<?php

?>
<head>
    <title>Dashboard</title>
    <link rel="stylesheet" href="<?php echo ASSETSCSS; ?>dashboard.css"/>
</head>

<header class="view-header--animal">
    <h1 class="view-title">Ajouter un habitat</h1>
</header>

<!--View Menu + content-->
<section class="addView-container">
    <div class="form-container">
        <form class="form" action="<?php echo HOST; ?>addLivingToDatabase" method="post" enctype="multipart/form-data">
            <ul>
                <li >
                    <label class="form-field" for="name"> Nom Habitat:
                        <input type="text" name="name" placeholder="Savane" required>
                    </label>
                </li>
                <li >
                    <label class="form-field" for="description"> Description:
                        <textarea rows="5" cols="33"  name="description" placeholder="Texte de description" required></textarea>
                    </label>
                </li>
                <li>
                    <label  class="form-field" for="file"> Ajouter une photo :
                        <input type="file" name="file" accept=".jpeg,.png,.jpg,.webp" required>
                    </label>
                </li>
                <li>
                    <div class="form-buttonContainer">
                        <button class="button button--success" type="submit">Ajouter</button>
                        <a class="button button--danger" href="<?php echo HOST; ?>dashboardLivings" >Annuler</a>
                    </div>
                </li>
            </ul>
        </form>

    </div>
</section>

