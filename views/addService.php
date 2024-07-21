<?php

?>
<head>
    <title>Dashboard</title>
    <link rel="stylesheet" href="<?php echo ASSETSCSS; ?>dashboard.css"/>
    <link rel="stylesheet" href="<?php echo ASSETSCSS;?>toastr.css">
    <script type="text/javascript" src="<?php echo SCRIPTS; ?>jquery3.7.1.js" defer ></script>
    <script type="text/javascript" src="<?php echo SCRIPTS; ?>toastr.js" defer ></script>
    <script type="text/javascript" src="<?php echo SCRIPTS; ?>addServiceApproval.js" defer></script>
</head>

<header class="view-header--animal">
    <h1 class="view-title">Ajouter un service</h1>
</header>

<!--View Menu + content-->
<section class="dashboardView-container">
    <div class="form-container">
        <form class="form" id="addServiceForm"  action="<?php echo HOST; ?>addServiceToDatabase" method="post" enctype="multipart/form-data">
            <ul>
                <li >
                    <label class="form-field" for="name"> Nom Service:
                        <input id="serviceName" type="text" name="name" placeholder="Restaurant" required>
                    </label>
                </li>
                <li >
                    <label class="form-field" for="schedule"> Horaires:
                        <input id="serviceSchedule" type="text" name="schedule" placeholder="11h30 - 14h00" required>
                    </label>
                </li>
                <li >
                    <label class="form-field" for="contactInfos"> Information de contact:
                        <input id="serviceContact" type="text" name="contactInfos" placeholder="04 56 78 91 01" required>
                    </label>
                </li>
                <li >
                    <label class="form-field" for="description"> Description:
                        <textarea id="serviceDescription" rows="5" cols="33"  name="description" placeholder="Texte de description" required></textarea>
                    </label>
                </li>
                <li>
                    <label  class="form-field" for="file"> Ajouter une photo :
                        <input id="serviceFile" type="file" name="file" accept=".jpeg,.png,.jpg,.webp" required>
                    </label>
                </li>
                <li>
                    <div class="form-buttonContainer">
                        <button class="button button--success" type="submit" onclick="formApproval()">Ajouter</button>
                        <a class="button button--danger" href="<?php echo HOST; ?>dashboardServices" >Annuler</a>
                    </div>
                </li>
            </ul>
        </form>

    </div>
</section>

