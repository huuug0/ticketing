<?php $this->titre = "Ticketing"; ?>

<?php foreach ($tickets as $ticket):
    ?>
    <article>
        <header>
            <a href="<?= "index.php?action=ticket&id=" . $ticket['id'] ?>">
                <h1 class="titreticket"><?= $ticket['titre'] ?></h1>
                
                <p><?= $ticket['date'] ?></p>
            </a>
        
        </header>
        <p><?= $ticket['contenu'] ?></p>
       
    </article>
    <hr />
<?php endforeach; ?>
