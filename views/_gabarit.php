<?php
echo '<pre>';
echo '_gabarit.php called';
echo '<pre>';
?>


<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <link rel="stylesheet" href="<?php echo ASSETSCSS; ?>main.css"/>
    <script type="text/javascript" src="<?php echo SCRIPTS ?>responsiveMenu.js" defer></script>
</head>
<header class="header">
    <div class="header-container">
        <div class="logo-container">
            <img class="logo" src="<?php echo ASSETSLOGO; ?>main_logo.png" alt=""/>
            <p>Brocéliande</p>
        </div>
        <nav class="header-navContainer">
            <ul class="header-nav" id="header-nav">
                <li class="header-link"><a href="<?php echo HOST; ?>home">Accueil</a></li>
                <li class="header-link"><a href="<?php echo HOST; ?>livings">Habitats</a></li>
                <li class="header-link"><a href="<?php echo HOST; ?>services">Services</a></li>
                <li class="header-link"><a href="<?php echo HOST; ?>contact">Contact</a></li>
                <li class="header-link"><a href="<?php echo HOST; ?>connect">Connexion</a></li>
            </ul>
        </nav>
        <svg
                class="burger"
                id="burger"
                xmlns="http://www.w3.org/2000/svg"
                width="16"
                height="16"
                fill="#FFF"
                viewBox="0 0 16 16"
        >
            <path
                    fill-rule="evenodd"
                    d="M2.5 12a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5m0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5m0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5"
            />
        </svg>
    </div>

</header>
<body>
<!-- Page content-->
<?php if
(isset($contentPage)) {
    echo $contentPage;
}
?>

</body>
<footer class="footer">
    <header class="footer-header">
        <img class="footer-logo" src="<?php echo ASSETSLOGO; ?>main_logo.png" alt="">
        <p class="footer-slogan">Slogan du site</p>
        <p class="footer-subText">Un autre texte</p>
    </header>
    <nav class="footer-navContainer">
        <ul class="footer-nav">
            <li class="footer-link"><a href="">Lien</a></li>
            <li class="footer-link"><a href="">Lien</a></li>
            <li class="footer-link"><a href="">Lien</a></li>
        </ul>
        <ul class="footer-nav">
            <li class="footer-link"><a href="">Lien</a></li>
            <li class="footer-link"><a href="">Lien</a></li>
            <li class="footer-link"><a href="">Lien</a></li>
        </ul>
        <ul class="footer-nav">
            <li class="footer-link"><a href="">Lien</a></li>
            <li class="footer-link"><a href="">Lien</a></li>
            <li class="footer-link"><a href="">Lien</a></li>
        </ul>
    </nav>
    <footer class="footer-footer">
        <nav class="footer-navContainer">
            <ul class="footer-nav footer-nav--row">
                <li class="footer-link footer-link--light"><a href="">Terms of service</a></li>
                <li class="footer-link footer-link--light"><a href="">Privacy policy</a></li>
                <li class="footer-link footer-link--light"><a href="">Remerciements</a></li>
                <li class="trademark">@2024</li>
            </ul>
        </nav>
    </footer>
</footer>
</html>

