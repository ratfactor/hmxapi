<?php
// Get book "database" with $authors and $authors.
require('bookdb.php');

$author = $authors[$req_author];
?>

<div class="item-image">
    <img src="/images/<?=$author['image']?>">
    <p>Click <a href="/images/<?=$author['image']?>/meta">here</a> for author cover image metadata.</p>
</div>

<h1><?=$author['name']?></h1>

<p><?=$author['name']?> was born in <?=$author['born']?>.</p>

<h3>Books</h3>

<div class="thumblist">
<?php foreach ($author['books'] as $id): $book = $books[$id]; ?>
    <a href="books/<?=$id?>">
        <div>
            <img src="/images/<?=$book['image']?>">
            <span><?=$book['title']?></span>
        </div>
    </a>
<?php endforeach; ?>
</div>
