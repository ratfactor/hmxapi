<?php
// Get book "database" with $authors and $books.
require('bookdb.php');
?>

<?php if ($render_head): ?>
    <h1>Books</h1>
<?php endif; ?>

<div class="thumblist">
<?php foreach ($books as $id => $book): ?>
    <a href="books/<?=$id?>">
        <div>
            <img src="/images/<?=$book['image']?>">
            <span><?=$book['title']?></span>
        </div>
    </a>
<?php endforeach; ?>
</div>
