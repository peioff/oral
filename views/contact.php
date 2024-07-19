
<head>
    <title>Arcadia - Contact</title>
    <link rel="stylesheet" href="<?php echo ASSETSCSS;?>contact.css">
</head>
<body class="body flux">
<main class="main">
    <h1 id="title" class="title headband">Contact</h1>
</main>
<section class="infos">
    <article class="info info--mail">
        <div class="info-header">
            <svg class="info-svg" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
                <path d="M.05 3.555A2 2 0 0 1 2 2h12a2 2 0 0 1 1.95 1.555L8 8.414zM0 4.697v7.104l5.803-3.558zM6.761 8.83l-6.57 4.027A2 2 0 0 0 2 14h12a2 2 0 0 0 1.808-1.144l-6.57-4.027L8 9.586zm3.436-.586L16 11.801V4.697z"/>
            </svg>
            <h2 class="info-label">Email</h2>
        </div>
        <p class="info-content">contact@arcadia.fr</p>


    </article>
    <article class="info info--phone">
        <div class="info-header">
            <svg class="info-svg" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
                <path fill-rule="evenodd" d="M1.885.511a1.745 1.745 0 0 1 2.61.163L6.29 2.98c.329.423.445.974.315 1.494l-.547 2.19a.68.68 0 0 0 .178.643l2.457 2.457a.68.68 0 0 0 .644.178l2.189-.547a1.75 1.75 0 0 1 1.494.315l2.306 1.794c.829.645.905 1.87.163 2.611l-1.034 1.034c-.74.74-1.846 1.065-2.877.702a18.6 18.6 0 0 1-7.01-4.42 18.6 18.6 0 0 1-4.42-7.009c-.362-1.03-.037-2.137.703-2.877z"/>
            </svg>
            <h2 class="info-label">Téléphone</h2>
        </div>
        <p class="info-content">04 56 78 91 01</p>
    </article>
    <article class="info info--adress">
        <div class="info-header">
            <svg class="info-svg" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
                <path d="M8 16s6-5.686 6-10A6 6 0 0 0 2 6c0 4.314 6 10 6 10m0-7a3 3 0 1 1 0-6 3 3 0 0 1 0 6"/>

            </svg>
            <h2 class="info-label">Adresse</h2>
        </div>
        <p class="info-content">29 rue du Zoo, 56380, Beignon </p>


    </article>
</section>
<article class="contact">
    <h2 class="contact-title">Envoyer un message</h2>
    <form class="form" action="<?php echo HOST ?>addContactToDatabase" method="post">
        <ul class="form-container">
            <li class="form-field--nickname">
                <label class="form-labelContainer" for="nickname">
                    <h3 class="form-label">Pseudonyme</h3>
                    <input class="form-input" name="nickname" type="text" placeholder="ex: Martin56" >
                </label>
            </li>
            <li class="form-field--messageTitle">
                <label class="form-labelContainer" for="title">
                    <h3 class="form-label">Titre du message</h3>
                    <input class="form-input" name="title" type="text" placeholder="Quel est l'objet de votre demande?" >
                </label>
            </li>
            <li class="form-field--email">
                <label class="form-labelContainer" for="email">
                    <h3 class="form-label">Votre Email</h3>
                    <input class="form-input" name="email" type="email" placeholder="exemple@exemple.com" >
                </label>
            </li>
            <li class="form-field--message">
                <label class="form-labelContainer" for="content">
                    <h3 class="form-label">Votre message</h3>
                    <textarea class="form-input form-input--area" name="content" placeholder="Votre message" rows="5" maxlength="200"></textarea>
                </label>
            </li>
            <li class="form-buttonContainer">
                <button class="button button--form" type="submit" >Envoyer</button>
                </div>
            </li>
        </ul>
    </form>
</article>
</body>
