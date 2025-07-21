<?php
$photos = scandir('uploads/');
$extension = strtolower(pathinfo($photo, PATHINFO_EXTENSION));
$todayY = date('Y');

?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/16e9ed29a1.js" crossorigin="anonymous"></script>
    <title>Mini Insta</title>
</head>
<body>
    <section class="scroller">


        <?php foreach($photos as $photo):
            if($photo != '.' && $photo != '..'):
            $basename = basename($photo);
            $fileY = date('Y', filemtime("uploads/$photo"));
            $fdate = date('d/m/Y', filemtime("uploads/$photo"));?>

            <div class="card_img">
                <img src="uploads/<?= $photo?>" alt="img uploadée">
                <div class="card_txt">
                    <h1><?= $basename?></h1>
                    <p>Il y a <?= $todayY - $fileY?> an(s).</p>
                    <p><?= $fdate?></p>
                </div>
            </div>
            <?php endif; ?>
        <?php endforeach;?>


    </section>
    <section class="action">
        <input id="refresh" <?php header("Refresh:0")?>>
            <label class="l_refresh" for="refresh">
                <i class="fa-solid fa-arrows-rotate"></i>
            </label>
        <form action="upload.php" method="post" enctype="multipart/form-data">
            <label class="l_parcourir" for="parcourir">
                <i class="fa-solid fa-images"></i>
            </label>
            <label class="l_send" for="send">
                <i class="fa-solid fa-cloud-arrow-up"></i>
            </label>
            <input id="parcourir" type="file" name="photo" accept="image/*">
            <input id="send" type="submit">
        </form>
    </section>
</body>
</html>
<style>
    html{
        background: linear-gradient(#7C16A4, #FF00B2);
        height: 100%;
    }
    h1{
        margin: 0;
            font-size: 1em;
    }
    p{
        margin: 0;
    }
    body{
    display: flex;
    flex-direction: column;
    align-items: center;
    }
    .card_img{
    width: 80%;
    display: flex;
    flex-direction: column;
    align-items: center;
    margin-top: 3vh;
    margin-bottom: 5vh;
    }
    .card_txt{
        width: 100%;
        display: flex;
        flex-direction: column;
        align-items: flex-start;
        margin-top: 2vh;
    }
    img{
        width: 100%;
    }
    .scroller{
    width : 100%;
    height : 80vh;
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: flex-start;
    overflow: scroll
    }
    .action{
        display: grid;
        grid-template-columns: 1fr 2fr;
        padding: 3vh 0 3vh 0;
    }
    form{
        display: grid;
        grid-template-columns: 1fr 1fr;
        column-gap: 10%;
    }
    label{
        display: inline-block;
        cursor: pointer;
    }
    input{
        display: none;
    }
    i{
        font-size : 5rem;
        color : white;
    }
</style>