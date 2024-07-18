<?php
if (!empty($data)){
    $animals = $data['animals'];
    $feedings = $data['feedings'];
}


?>
<head>
    <title>Dashboard</title>
    <link rel="stylesheet" href="<?php echo ASSETSCSS; ?>dashboard.css"/>
</head>

<header class="view-header--animal">
    <h1 class="view-title">Ajouter un service</h1>
</header>

<!--View Menu + content-->
<section class="dashboardView-container">
    <div class="form-container">
        <form class="form" action="<?php echo HOST; ?>addReportToDatabase" method="post">
            <ul>
                <li >
                    <label  class="form-field" for="animal"> Animal concerné:
                        <select  name="animal">
                            <option>Choose Animal</option>
                            <?php foreach ($animals as $animal): ?>
                            <option value="<?php echo $animal->getName() ?>"><?php echo $animal->getName() . ' - ' . $animal->getLiving() ?></option>
                            <?php endforeach; ?>
                        </select>
                    </label>
                </li>
                <li >
                    <label class="form-field" for="date"> Date du rapport:
                        <input type="date" name="date"  required>
                    </label>
                </li>
                <li >
                    <label class="form-field" for="health"> Etat de santé:
                        <select name="health">
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
                        <textarea rows="5" cols="33"  name="remark" placeholder="Write here what you have in mind..." required></textarea>
                    </label>
                </li>
                    <div class="form-buttonContainer">
                        <button class="button button--success" type="submit">Ajouter</button>
                        <a class="button button--danger" href="<?php echo HOST; ?>dashboardVet" >Annuler</a>
                    </div>
                </li>
            </ul>
        </form>

    </div>
</section>

