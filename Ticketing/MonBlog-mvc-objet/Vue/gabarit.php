<!doctype html>
<html lang="fr">
    <head>
        <meta charset="UTF-8" />
        <link rel="stylesheet" href="Contenu/Style.css" />
        <title><?= $titre ?></title>
    </head>
    <body>
        <div id="global">
            <header>
                <a href="index.php"><h1 id="titreBlog">Ticketing</h1></a>
                <p>Je vous souhaite la bienvenue sur cet outil de ticketing</p>
            </header>
            <div id="contenu">
                <?= $contenu ?>
                <div id="lib">
                <?= $lib ?>
            </div> <!-- #contenu -->
            <footer id="piedBlog">
                Ticketing réalisé avec PHP, HTML5 et CSS.
            </footer>
        </div> <!-- #global -->
    </body>
</html>