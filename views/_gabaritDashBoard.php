<?php
session_start();
if (isset($_SESSION)) {
    $sessionUser = $_SESSION['sessionUser'];
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <link rel="stylesheet" href="<?php echo ASSETSCSS; ?>dashboard.css"/>
</head>
<header class="header">
    <div class="logo-container">
        <svg
                class="review-svg"
                xmlns="http://www.w3.org/2000/svg"
                width="50"
                height="50"
                fill="currentColor"
                viewBox="0 0 16 16"
        >
            <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0"/>
            <path
                    fill-rule="evenodd"
                    d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8m8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1"
            />
        </svg>
        <p class="welcome-text">Connected as <?php echo $sessionUser; ?></p>
    </div>
    <a class="button" href="<?php echo HOST; ?>home"> Disconnect</a>
</header>

<body class="body">
<?php if
(isset($contentPage)) {
    echo $contentPage;
}
?>

</body>
</html>
