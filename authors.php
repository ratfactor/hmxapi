<?php
// Get book "database" with $authors and $books.
require('bookdb.php');

if ($querystring !== 'partial'):
?>
    <h1>Authors</h1>

    <a href="/authors/new" hx-boost="true" hx-target="this" hx-swap="outerHTML">Add Author</a>
<?php endif; ?>

<div class="thumblist">
<?php foreach ($authors as $id => $author): ?>
    <div><a href="authors/<?=$id?>">
        <img src="/static/<?=$author['image']?>">
        <span><?=$author['name']?></span>
    </a></div>
<?php endforeach; ?>
</div>
