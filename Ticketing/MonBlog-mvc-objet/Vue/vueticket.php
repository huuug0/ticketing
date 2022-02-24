<?php $this->titre = "Ticketing " . $ticket['titre']; ?>

<article>
    <header>
        <h1 class="titreticket"><?= $ticket['titre'] ?></h1>
        <time><?= $ticket['date'] ?></time>
    </header>
    <p><?= $ticket['lib'] ?></p>
    <p><?= $ticket['contenu'] ?></p>
</article>
<hr />
<header>
    <h1 id="titreReponses">Réponses à <?= $ticket['titre'] ?></h1>
</header>
<?php foreach ($commentaires as $commentaire): ?>
    <p><?= $commentaire['auteur'] ?> dit :</p>
    <p><?= $commentaire['contenu'] ?></p>
    <p><?= $commentaire['date'] ?></p>
<?php endforeach; ?>
<hr />
<form method="post" action="index.php?action=commenter">
    <input id="auteur" name="auteur" type="text" placeholder="Votre pseudo" 
           required /><br />
    <textarea id="txtCommentaire" name="contenu" rows="4" 
              placeholder="Votre commentaire" required></textarea><br />
    <input type="hidden" name="id" value="<?= $ticket['id'] ?>" />
    <input type="submit" value="Commenter" />
</form>

