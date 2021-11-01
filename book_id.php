<?php
// Get book "database" with $authors and $books.
require('bookdb.php');

$book = $books[$req_book];
?>

<div class="item-image">
    <img src="/images/<?=$book['image']?>">
    <p>Click <a href="/images/<?=$book['image']?>/meta">here</a> for book cover image metadata.</p>
</div>

<h1><?=$book['title']?></h1>

<p><?=$book['title']?> was published in <?=$book['published']?>.</p>

<h3>Author(s)</h3>

<div class="thumblist">
<?php foreach ($book['authors'] as $id): $author = $authors[$id]; ?>
    <a href="authors/<?=$id?>">
        <div>
            <img src="/images/<?=$author['image']?>">
            <span><?=$author['name']?></span>
        </div>
    </a>
<?php endforeach; ?>
</div>
