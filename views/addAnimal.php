<?php

?>
<head>
    <title>Dashboard</title>
    <link rel="stylesheet" href="<?php echo ASSETSCSS; ?>dashboard.css"/>
</head>

<header class="view-header--animal">
    <h1 class="view-title">Ajouter un animal</h1>
</header>

<!--View Menu + content-->
<section class="addView-container">
    <div class="form-container">
        <form class="form" action="<?php echo HOST; ?>addAnimalToDatabase" method="post" enctype="multipart/form-data">
            <ul>
                <li >
                    <label class="form-field" for="name"> Nom animal:
                        <input type="text" name="name" placeholder="Titus" required>
                    </label>
                </li>
                <li >
                    <label class="form-field" for="species"> Espèce:
                        <input type="text" name="species" placeholder="Antilopinae" required>
                    </label>
                </li>
                <li >
                    <label class="form-field" for="living"> Habitat:
                        <input type="text" name="living" placeholder="Savane" required>
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
                        <a class="button button--danger" href="<?php echo HOST; ?>dashboardAnimals" >Annuler</a>
                    </div>
                </li>
            </ul>
        </form>

    </div>
</section>

