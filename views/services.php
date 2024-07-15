
<head>
    <title>Arcadia - Services</title>
    <link rel="stylesheet" href="<?php echo ASSETSCSS;?>services.css">
</head>
<?php
if(isset($services)){}
?>

<body class="body flux">
<main class="main">
    <section class="services">
        <?php foreach($services as $service):?>
        <article class="service">
            <h2 class="title service-title">
                <?php
                echo $service->getName();
                ?>
            </h2>
            <img class="service-picture" src="data:image/jpeg;base64,<?php echo base64_encode( $service->getImage() ); ?>" alt="">
            <p class="service-description">
                <?php
                echo $service->getDescription();
                ?>
            </p>
            <footer class="service-footer">
                <p><?php echo $service->getSchedule() ?></p>
                <p><?php echo $service->getContactInfo() ?></p>
            </footer>
        </article>
        <?php endforeach; ?>
<!--        <article class="service service--reverse">-->
<!--            <h2 class="title service-title">Visite guidée</h2>-->
<!--            <img class="service-picture" src="--><?php //echo ASSETSIMG;?><!--beer-garden-4465324_1280.jpg" alt="">-->
<!--            <p class="service-description">Texte de description du service en quelques lignes</p>-->
<!--            <footer class="service-footer">-->
<!--                <p>11h30 - 14h00</p>-->
<!--                <p>07 89 80 52 65</p>-->
<!--            </footer>-->
<!--        </article>-->

    </section>
</main>

</body>
