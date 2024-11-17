<?php
if (!empty($data)){
    $animals = $data['animals'];
    $feedings = $data['feedings'];
}


?>
<head>
    <title>Dashboard</title>
    <link rel="stylesheet" href="<?php echo ASSETSCSS; ?>dashboard.css"/>
    <link rel="stylesheet" href="<?php echo ASSETSCSS;?>toastr.css">
    <script type="text/javascript" src="<?php echo SCRIPTS; ?>jquery3.7.1.js" defer ></script>
    <script type="text/javascript" src="<?php echo SCRIPTS; ?>toastr.js" defer ></script>
    <script type="text/javascript" src="<?php echo SCRIPTS; ?>addReportApproval.js" defer></script>
</head>

<header class="view-header--animal">
    <h1 class="view-title">Créer un rapport vétérinaire</h1>
</header>

<!--View Menu + content-->
<section class="dashboardView-container">
    <div class="form-container">
        <form class="form" id="addReportForm" method="post">
            <ul>
                <li >
                    <label  class="form-field" for="animal"> Animal concerné:
                        <select id="animalName"  name="animal">
                            <option>Choose Animal</option>
                            <?php foreach ($animals as $animal): ?>
                            <option value="<?php echo $animal->getName() ?>"><?php echo $animal->getName() . ' - ' . $animal->getLiving() ?></option>
                            <?php endforeach; ?>
                        </select>
                    </label>
                </li>
                <li >
                    <label class="form-field" for="date"> Date du rapport:
                        <input id="reportDate" type="date" name="date"  required>
                    </label>
                </li>
                <li >
                    <label class="form-field" for="health"> Etat de santé:
                        <select id="animalHealth" name="health">
                            <option>Excellent</option>
                            <option>Good</option>
                            <option>Acceptable</option>
                            <option>Average</option>
                            <option>Bad</option>
                        </select>
                    </label>
                </li>
                <li >
                    <label class="form-field" for="remark"> Remarques:
                        <textarea id="reportRemark" rows="5" cols="33"  name="remark" placeholder="Write here what you have in mind..."></textarea>
                    </label>
                </li>
                    <div class="form-buttonContainer">
                        <button class="button button--success" type="submit" onclick="addReport()">Ajouter</button>
                        <a class="button button--danger" href="<?php echo HOST; ?>dashboardVet" >Annuler</a>
                    </div>
                </li>
            </ul>
        </form>

    </div>
</section>

