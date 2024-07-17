<?php

?>
<head>
    <title>Dashboard</title>
    <link rel="stylesheet" href="<?php echo ASSETSCSS; ?>dashboard.css"/>
</head>

<header class="view-header--animal">
    <h1 class="view-title">Ajouter un service</h1>
</header>

<!--View Menu + content-->
<section class="addView-container">
    <div class="form-container">
        <form class="form" action="<?php echo HOST; ?>addServiceToDatabase" method="post" enctype="multipart/form-data">
            <ul>
                <li >
                    <label class="form-field" for="name"> Nom Service:
                        <input type="text" name="name" placeholder="Restaurant" required>
                    </label>
                </li>
                <li >
                    <label class="form-field" for="schedule"> Horaires:
                        <input type="text" name="schedule" placeholder="11h30 - 14h00" required>
                    </label>
                </li>
                <li >
                    <label class="form-field" for="contactInfos"> Information de contact:
                        <input type="text" name="contactInfos" placeholder="04 56 78 91 01" required>
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
                        <a class="button button--danger" href="<?php echo HOST; ?>dashboardServices" >Annuler</a>
                    </div>
                </li>
            </ul>
        </form>

    </div>
</section>

