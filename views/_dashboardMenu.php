<?php
if (isset($user))
?>
<head>
    <link rel="stylesheet" href="<?php echo ASSETSCSS; ?>dashboard.css"/>
</head>
<nav class="dashboardView-nav" id="header-nav">
    <ul class="menu">
        <li class="menu-button"><a class="menu-link" href="<?php echo HOST; ?>dashboardAnimals">Animaux</a></li>
        <li class="menu-button"><a class="menu-link"  href="<?php echo HOST; ?>dashboardLivings">Habitats</a></li>
        <li class="menu-button"><a class="menu-link"  href="<?php echo HOST; ?>dashboardServices">Services</a></li>
        <li class="menu-button"><a class="menu-link"  href="<?php echo HOST; ?>dashboardFeedings">Nourrissage</a></li>
        <li class="menu-button"><a class="menu-link"  href="<?php echo HOST; ?>dashboardVet">Vétérinaire</a></li>
        <li class="menu-button"><a class="menu-link"  href="<?php echo HOST; ?>dashboardComments">Commentaires</a></li>
        <li class="menu-button"><a class="menu-link"  href="<?php echo HOST; ?>dashboardUsers">Utilisateurs</a></li>
        <li class="menu-button"><a class="menu-link"  href="<?php echo HOST; ?>dashboardContacts">Contacts</a></li>
    </ul>
</nav>
