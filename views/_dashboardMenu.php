<?php
if (isset($user))
?>
<head>
    <link rel="stylesheet" href="<?php echo ASSETSCSS; ?>dashboard.css"/>
</head>
<nav>
    <ul class="menu">
        <li class="menu-button"><a href="<?php echo HOST; ?>dashboardAnimals">Animaux</a></li>
        <li class="menu-button"><a href="<?php echo HOST; ?>dashboardLivings">Habitats</a></li>
        <li class="menu-button"><a href="<?php echo HOST; ?>dashboardServices">Services</a></li>
        <li class="menu-button"><a href="<?php echo HOST; ?>dashboardFeedings">Nourrissage</a></li>
        <li class="menu-button"><a href="<?php echo HOST; ?>dashboardVeterinaryReport">Rapport vétérinaire</a></li>

        <li class="menu-button"><a href="">Commentaires</a></li>
        <li class="menu-button"><a href="">Utilisateurs</a></li>
    </ul>
</nav>
