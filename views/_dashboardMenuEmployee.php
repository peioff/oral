<?php
if (isset($user))
?>
<head>
    <link rel="stylesheet" href="<?php echo ASSETSCSS; ?>dashboard.css"/>
</head>
<nav>
    <ul class="menu">
        <li class="menu-button"><a class="menu-link"  href="<?php echo HOST; ?>dashboardServices">Services</a></li>
        <li class="menu-button"><a class="menu-link"  href="<?php echo HOST; ?>dashboardFeedings">Nourrissage</a></li>
        <li class="menu-button"><a class="menu-link"  href="<?php echo HOST; ?>dashboardComments">Commentaires</a></li>
    </ul>
</nav>
