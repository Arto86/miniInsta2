<?php
if(isset($_FILES['photo']) && $_FILES['photo']['error'] === 0){
    $tmpname = $_FILES['photo']['tmp_name'];
    $name = $_FILES['photo']['name'];
    $timestamp = filemtime($tmpname);
    $file = new SplFileInfo($name);
    $photoext = strtolower($file->getExtension());
    $photosize = $_FILES['photo']['size'];
    $photomime = mime_content_type($tmpname);

    $extallowed = ['jpg', 'png', 'webp', 'jpeg'];
    $mimeallowed = ['image/jpg', 'image/png', 'image/jpeg', 'image.webp'];
    $sizeallowed = 5 * 1024 * 1024;

    if(!in_array($photoext, $extallowed) || !in_array($photomime, $mimeallowed)){ ?>
        <h1>Extension ou type de fichier non autorisé</h1> <?php
    } else if($sizeallowed < $photosize){?>
        <h1>Fichier trop volumineux (Max 5Mo)</h1> <?php
    } else {
    $newname = rename($tmpname, "uploads/$timestamp-$name");

    ?>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
    </head>
    <body>
        <div>
            <h1>Mini Insta</h1>
            <h2>Upload réussi !</h2>
        </div>
        <div>
            <img src="<?= "uploads/$timestamp-$name"?>" alt="Nouvel image uploadée">
            <p><?= $name?></p>
        </div>
        <a href="index.php">
        <button type="button">Retour à l'Acceuil</button>
        </a>
    </body>
    </html>


    <style>
    html{
        background-color: lightblue;
        color: white;
    }
    body{
        display: flex;
        flex-direction: column;
        align-items: center;
    }
    button{
        padding: 5vh 3vh 5vh 3vh;
    }
    </style>
    <?php
    }
}
    ?>