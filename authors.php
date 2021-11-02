<?php
// Get book "database" with $authors and $books.
require('bookdb.php');
?>

<?php if ($render_head): ?>
    <h1>Authors</h1>
<?php endif; ?>

<div class="thumblist">
<?php foreach ($authors as $id => $author): ?>
    <a href="authors/<?=$id?>">
        <div>
            <img src="/images/<?=$author['image']?>">
            <span><?=$author['name']?></span>
        </div>
    </a>
<?php endforeach; ?>
</div>
