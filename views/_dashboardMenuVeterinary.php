<?php
if (isset($user))
?>
<head>
    <link rel="stylesheet" href="<?php echo ASSETSCSS; ?>dashboard.css"/>
</head>
<nav class="dashboardView-nav" id="header-nav">
    <ul class="menu">
        <li class="menu-button"><a class="menu-link"  href="<?php echo HOST; ?>dashboardVet">Vétérinaire</a></li>
        <li class="menu-button"><a class="menu-link"  href="<?php echo HOST; ?>dashboardFeedings">Nourrissage</a></li>
    </ul>
</nav>
